<?php

namespace Messy\Provider;

use Messy\MessageInterface;
use Monolog\Logger;

/**
* 
*/
class MonologProvider implements ProviderInterface
{
  protected $monolog;

  protected $level;

  public function __construct(Logger $monolog, $level)
  {
    $this->monolog = $monolog;
    $this->level = $level;
  }

  public function sendMessage(MessageInterface $message)
  {
    $log_message = 
"========= M E S S Y - MonologProvider =========
Message: ".$message->getMessageBody()."
Sender: ".$message->getSender()->getNormalizedPhoneNumber()." (".$message->getSender()->getName().")
";
    foreach ($message->getRecipients() as $key => $recipient) {
      $log_message .= 'Recipient ' . ($key + 1) . ': ' . $recipient->getNormalizedPhoneNumber() . ' (' . $recipient->getName() . ")\n";
    }

    $this->monolog->addRecord($this->level, $log_message);
  }
  
  public function supports(MessageInterface $message)
  {
    return true;
  } 
}