<?php

namespace Messy\Provider;

use Messy\MessageInterface;

// TODO: Implement

class MailProvider implements ProviderInterface
{
  
  public function sendMessage(MessageInterface $message)
  {
        
  }
  
  public function supports(MessageInterface $message)
  {
    return true;
  }
}