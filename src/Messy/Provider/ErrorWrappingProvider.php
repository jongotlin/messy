<?php

namespace Messy\Provider;

use Messy\MessageInterface;
use Monolog\Logger;

/**
* 
*/
class ErrorWrappingProvider implements ProviderInterface
{
  protected $monolog;
  protected $level;

  protected $wrapped_provider;

  public function __construct(Logger $monolog, $level, ProviderInterface $wrapped_provider)
  {
    $this->monolog = $monolog;
    $this->level = $level;

    $this->wrapped_provider = $wrapped_provider;
  }

  public function sendMessage(MessageInterface $message)
  {
    try
    {
      $this->wrapped_provider->sendMessage($message);
    }
    catch (\Exception $e)
    {
      $log_message = "SMS Sending failed with exception: ".get_class($e).": ".$e->getMessage();
      $this->monolog->addRecord($this->level, $log_message);
    }
  }
  
  public function supports(MessageInterface $message)
  {
    return $this->wrapped_provider->supports($message);
  } 
}