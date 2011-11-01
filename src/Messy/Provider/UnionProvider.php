<?php

namespace Messy\Provider;

use Messy\MessageInterface;
use Monolog\Logger;

/**
* 
*/
class UnionProvider implements ProviderInterface
{
  protected $subproviders;

  public function __construct(array $subproviders)
  {
    $this->subproviders = $subproviders;
  }

  public function sendMessage(MessageInterface $message)
  {
    foreach ($this->subproviders as $provider)
    {
      $provider->sendMessage($message);
    }
  }
  
  public function supports(MessageInterface $message)
  {
    foreach ($this->subproviders as $provider)
    {
      if (!$provider->supports($message))
      {
        return false;
      }
    }
    return true;
  } 
}