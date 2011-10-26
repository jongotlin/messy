<?php

namespace Messy\Provider;

use Messy\MessageInterface;

class BlackHoleProvider implements ProviderInterface
{
  public function sendMessage(MessageInterface $message)
  {
    // Do nothing
  }
  
  public function supports(MessageInterface $message)
  {
    return true;
  } 
}