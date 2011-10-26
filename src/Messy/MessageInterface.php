<?php

namespace Messy;

interface MessageInterface
{
  public function getRecipients();
  
  public function getMessageBody();
  
  public function getSender();
}