<?php

namespace Messy\Provider;

use Messy\MessageInterface;

interface ProviderInterface
{
  public function sendMessage(MessageInterface $message);
  
  public function supports(MessageInterface $message);  
}