<?php

namespace kosuha606\Declarative\Common;

class Stack extends Collection
{
    public function push($item)
    {
        $this->items[] = $item;
    }

    public function last()
    {
        return $this->items[count($this->items)-1] ?? null;
    }
}