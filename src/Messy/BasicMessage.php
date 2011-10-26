<?php

namespace Messy;

class BasicMessage implements MessageInterface
{
  protected $recipients = array();
  protected $message_body;
  protected $sender;
  
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
  
  public function addRecipient(MessagePartyInterface $recipient)
  {
    $this->recipients[] = $recipient;
  }
  
  public function setMessageBody($message_body)
  {
    $this->message_body = $message_body;
  }
  
  public function setSender(MessagePartyInterface $sender)
  {
    $this->sender = $sender;
  }
}