<?php

namespace App\Exceptions;

class ConnectMonException extends  MyException
{
    public function __construct()
    {
        $message = $this->create(func_get_args());
        parent::__construct($message);
    }
}