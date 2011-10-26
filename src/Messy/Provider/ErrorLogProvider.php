<?php

namespace Messy\Provider;

use Messy\MessageInterface;

class ErrorLogProvider implements ProviderInterface
{
  public function sendMessage(MessageInterface $message)
  {
    error_log("\n========= M E S S Y - ErrorLogProvider =========");
    error_log('Message:    ' . $message->getMessageBody());
    foreach ($message->getRecipients() as $key => $recipient) {
      error_log('Recipient ' . ($key + 1) . ': ' . $recipient->getNormalizedPhoneNumber() . ' (' . $recipient->getName() . ')');
    }
    error_log('Sender:      ' . $message->getSender()->getNormalizedPhoneNumber() . ' (' . $message->getSender()->getName() . ')'); 
  }
  
  public function supports(MessageInterface $message)
  {
    return true;
  } 
}