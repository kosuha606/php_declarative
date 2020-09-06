<?php

namespace kosuha606\Declarative\Common;

class Collection
{
    protected $items = [];

    public function add(CollectionItemInterface $item)
    {
        $this->items[$item->getId()] = $item;
    }

    public function get($id)
    {
        return $this->items[$id] ?? null;
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