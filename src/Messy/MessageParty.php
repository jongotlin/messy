<?php

namespace Messy;

class MessageParty implements MessagePartyInterface
{
  protected $phone_number, $name;
  
  public function getNormalizedPhoneNumber()
  {
    return $this->phone_number;
  }
  
  public function getName()
  {
    return $this->name;
  }
  
  public function setPhoneNumber($phone_number)
  {
    $this->phone_number = $phone_number;
  }
  
  public function setName($name)
  {
    $this->name = $name;
  }
}