<?php

namespace Messy\Test\Mock;

use Messy\MessagePartyInterface;

class MessagePartyMock implements MessagePartyInterface
{
  public $normalized_phone_number, $name;
  
  public function getNormalizedPhoneNumber()
  {
    return $this->normalized_phone_number;
  }

  public function getName()
  {
    return $this->name;
  }
}