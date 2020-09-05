<?php

namespace kosuha606\Declarative\Common;

use Throwable;

class NoAttributeException extends \Exception
{
    protected $message = 'No such attribute';

    public function __construct($attribute = 'undefined', $message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->message .= ' '.$attribute;
    }
}