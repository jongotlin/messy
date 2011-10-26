<?php

namespace Messy\Test;

use Messy\Provider\BlackHoleProvider;

class BlackHoleProviderTest extends \PHPUnit_Framework_TestCase
{
  public function testSupportsAnyMessage()
  {
    $message_mock = new Mock\MessageMock;
    
    $black_hole_provider = new BlackHoleProvider;
    
    $this->assertTrue($black_hole_provider->supports($message_mock));
  }
}