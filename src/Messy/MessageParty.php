<?php

namespace Messy;

class MessageParty implements MessagePartyInterface
{
  protected $phone_number, $name;
  
  public function getNormalizedPhoneNumber()
  {
    if ($this->phone_number == '') {
      return null;
    }
    
    $normalized_phone_number = $this->phone_number;
    
    if (substr($this->phone_number, 0, 1) == '0') {
      $normalized_phone_number = '+46' . substr($normalized_phone_number, 1);
    }
    
    $normalized_phone_number = preg_replace('/[-\s\/]/', '', $normalized_phone_number);
    
    if (!preg_match('/^\+?[0-9]+$/', $normalized_phone_number)) {
      throw new InvalidPhoneNumberException;
    }
    
    return $normalized_phone_number;
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

class InvalidPhoneNumberException extends \Exception {}