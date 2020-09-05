<?php

namespace kosuha606\Declarative\Common;

use Throwable;

class NoCollectionItemException extends \Exception
{
    protected $message = 'No such item with id = %s in collection';

    public function __construct($itemId, $message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
        $this->message = sprintf($this->message, $itemId);
    }
}