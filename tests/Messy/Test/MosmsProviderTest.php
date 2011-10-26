<?php

namespace Messy\Test;

use Messy\Provider\MosmsProvider;

class MosmsProviderTest extends \PHPUnit_Framework_TestCase
{
  public function testCanTransformNormalizedPhoneNumberToMoSMSPhoneNumberStandard()
  {
    $mosms_provider = new MosmsProvider('foo', 'bar');    
    $this->assertEquals('0701111111', $mosms_provider->transformNormalizedPhoneNumber('+46701111111'));
  }

  public function testCanOnlySendToSwedishPhoneNumbers()
  {
    $mosms_provider = new MosmsProvider('foo', 'bar');    
    $message_mock = new Mock\MessageMock;

    $swedish_recipient_mock = new Mock\MessagePartyMock;
    $swedish_recipient_mock->normalized_phone_number = '+46701111111';
    $message_mock->recipients = array($swedish_recipient_mock);
    $this->assertTrue($mosms_provider->supports($message_mock));

    $uk_recipient_mock = new Mock\MessagePartyMock;
    $uk_recipient_mock->normalized_phone_number = '+44701111111';
    $message_mock->recipients = array($uk_recipient_mock);
    $this->assertFalse($mosms_provider->supports($message_mock));

    $message_mock->recipients = array($swedish_recipient_mock, $uk_recipient_mock);
    $this->assertFalse($mosms_provider->supports($message_mock));
  }

}