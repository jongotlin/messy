<?php

namespace Messy\Test\Mock;

use Messy\MessageInterface;

class MessageMock implements MessageInterface
{  
  public $recipients = array();
  public $message_body, $sender;
  
  public function getRecipients()
  {
    return $this->recipients;
  }
  
  public function getMessageBody()
  {
    return $this->message_body;
  }
  
  public function getSender()
  {
    return $this->sender;
  }
}