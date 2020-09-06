<?php

namespace kosuha606\Declarative\Common;

class Storage
{
    public function readFile($filePath)
    {
        $content = require_once $filePath;

        return $content;
    }
}