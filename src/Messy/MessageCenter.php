<?php

namespace Messy;

use Messy\Provider\ProviderInterface;

class MessageCenter
{
  protected $providers = array();
  
  public function addProvider(ProviderInterface $provider)
  {
    $this->providers[] = $provider;
  }
  
  public function send(MessageInterface $message)
  {
    foreach ($this->providers as $provider) {
      if ($provider->supports($message)) {
        $provider->sendMessage($message);
        return;
      }
    }
    
    throw new \RuntimeException('No registered provider support this message');
  }
  
}