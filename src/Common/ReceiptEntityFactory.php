<?php

namespace kosuha606\Declarative\Common;

class ReceiptEntityFactory
{
    private $receipts = [];

    public function __construct($receipts)
    {
        $this->receipts = $receipts;
    }

    /**
     * @param $receipt
     * @param $id
     * @param $attributes
     * @return Entity
     * @throws \Exception
     */
    public function createEntity($receipt, $id, $attributes)
    {
        if (!isset($this->receipts[$receipt])) {
            throw new \Exception("No such receipt $receipt for entity");
        }

        if (!isset($this->receipts[$receipt]['attributes'])) {
            throw new \Exception("Receipt $receipt must have attributes definition");
        }

        $receiptAttribute = $this->receipts[$receipt]['attributes'];

        foreach ($attributes as $key => $value) {
            if (!in_array($key, $receiptAttribute)) {
                throw new \Exception("Entity $receipt do not has $key attribute");
            }
        }

        return new Entity($id, $attributes);
    }
}
