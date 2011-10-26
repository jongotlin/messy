<?php

namespace Messy\Test;

use Messy\BasicMessage;

class BasicMessageTest extends \PHPUnit_Framework_TestCase
{  
  public function testCanAddRecipient()
  {
    $message = new BasicMessage;
    
    $recipient = new Mock\MessagePartyMock;
    
    $message->addRecipient($recipient);
    
    $this->assertEquals(array($recipient), $message->getRecipients());
  }
  
  public function testCanAddSender()
  {
    $message = new BasicMessage;
    
    $sender = new Mock\MessagePartyMock;
    
    $message->setSender($sender);
    
    $this->assertEquals($sender, $message->getSender());
  }
  
  public function testCanAddMessageBody()
  {
    $message = new BasicMessage;
    
    $message->setMessageBody('Foo');
    
    $this->assertEquals('Foo', $message->getMessageBody());
  }
}