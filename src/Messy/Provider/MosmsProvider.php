<?php

namespace Messy\Provider;

use Messy\MessageInterface;

class MosmsProvider implements ProviderInterface
{

  protected $username, $password;
  
  public function __construct($username, $password)
  {
    $this->username = $username;
    $this->password = $password;
  }

  public function sendMessage(MessageInterface $message)
  {
    $url = 'http://www.mosms.com/se/sms-send.php';
    
    foreach ($message->getRecipients() as $recipient) {
      file_get_contents($url . "?username=" . $this->username
      	. "&password=" . $this->password . "&nr=" . $this->transformNormalizedPhoneNumber($recipient->getNormalizedPhoneNumber()) . "&type=text"
      	. "&data=" . rawurlencode(utf8_decode($message->getMessageBody())));
    }
  }

  public function supports(MessageInterface $message)
  {
    foreach ($message->getRecipients() as $recipient) {
      if (substr($recipient->getNormalizedPhoneNumber(), 0, 3) != '+46') {
        return false;
      }
    }
    return true;
  }
  
  public function transformNormalizedPhoneNumber($normalized_phone_number)
  {
    return str_replace('+46', '0', $normalized_phone_number);
  }
}