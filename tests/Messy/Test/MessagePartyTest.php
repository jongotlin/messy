<?php

namespace Messy\Test;

use Messy\MessageParty;

class MessagePartyTest extends \PHPUnit_Framework_TestCase
{
  public function testCanGetNormalizedPhoneNumberWhenPhoneNumberIsSetInSwedishStandar()
  {
    $message_party = new MessageParty;    
    $message_party->setPhoneNumber('0701111111');
    $this->assertEquals('+46701111111', $message_party->getNormalizedPhoneNumber());
  }

  public function testCanGetNormalizedPhoneNumberWhenPhoneNumberIncludesSpaces()
  {
    $message_party = new MessageParty;    
    $message_party->setPhoneNumber('070 111 11 11');
    $this->assertEquals('+46701111111', $message_party->getNormalizedPhoneNumber());
  }
  
  public function testCanGetNormalizedPhoneNumberWhenPhoneNumberIncludesMinusSign()
  {
    $message_party = new MessageParty;    
    $message_party->setPhoneNumber('070-1111111');
    $this->assertEquals('+46701111111', $message_party->getNormalizedPhoneNumber());
  }
  
  public function testCanGetNormalizedPhoneNumberWhenPhoneNumberIncludesSlash()
  {
    $message_party = new MessageParty;    
    $message_party->setPhoneNumber('070/1111111');
    $this->assertEquals('+46701111111', $message_party->getNormalizedPhoneNumber());
  }
  
  public function testCanGetNormalizedPhoneNumberWhenPhoneNumberAlreadyIsNormalized()
  {
    $message_party = new MessageParty;    
    $message_party->setPhoneNumber('+46701111111');
    $this->assertEquals('+46701111111', $message_party->getNormalizedPhoneNumber());
  }

  /**
   * @expectedException Messy\InvalidPhoneNumberException
   */
  public function testThowAnExceptionIfPhoneNumberIsText()
  {
    $message_party = new MessageParty;    
    $message_party->setPhoneNumber('teh internetz');
    $message_party->getNormalizedPhoneNumber();
  }

  /**
   * @expectedException Messy\InvalidPhoneNumberException
   */
  public function testThowAnExceptionIfPhoneNumberIncludesIllegalCharacters()
  {
    $message_party = new MessageParty;    
    $message_party->setPhoneNumber('070b1111111');
    $message_party->getNormalizedPhoneNumber();
  }
}