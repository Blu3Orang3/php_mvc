<?php

namespace App\Exceptions;

use Exception;

class ViewNotFoundException extends Exception
{
  public function __construct($message = "View not found", $code = 0, Exception $previous = null) {
    parent::__construct($message, $code, $previous);
  }
}
