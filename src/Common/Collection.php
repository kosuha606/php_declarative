<?php

namespace kosuha606\Declarative\Common;

class Collection
{
    private $items = [];

    public function add(CollectionItemInterface $item)
    {
        $this->items[$item->getId()] = $item;
    }

    /**
     * @param CollectionItemInterface $item
     * @throws NoCollectionItemException
     */
    public function remove(CollectionItemInterface $item)
    {
        if (!isset($this->items[$item->getId()])) {
            throw new NoCollectionItemException($item->getId());
        }

        unset($this->items[$item->getId()]);
    }

    public function count()
    {
        return count($this->items);
    }

    public function clear()
    {
        $this->items = [];
    }

    public function map($callback)
    {
        return array_map($callback, $this->items);
    }
}