<?php

namespace kosuha606\Declarative\Auction;

use kosuha606\Declarative\Common\Collection;
use kosuha606\Declarative\Common\Entity;
use kosuha606\Declarative\Common\ReceiptEntityFactory;
use kosuha606\Declarative\Common\Stack;

class LotWorkflow
{
    /**
     * @var Entity
     */
    private $lot;

    /** @var Collection */
    private $bids;
    /**
     * @var ReceiptEntityFactory
     */
    private $entityFactory;

    public function __construct(Entity $lot, ReceiptEntityFactory $entityFactory)
    {
        $this->lot = $lot;
        $this->bids = new Stack();
        $this->entityFactory = $entityFactory;
    }

    /**
     * @param Entity $user
     * @param $price
     * @throws \Exception
     */
    public function addBid(Entity $user, $price)
    {
        $this->bids->push($this->entityFactory->createEntity('bid', 'id', [
            'id' => time(),
            'lot_id' => $this->lot->id,
            'user_id' => $user->id,
            'created_at' => date('Y-m-d H:i:s'),
            'price' => $price,
        ]));
    }

    public function auctionPrice()
    {
        if ($lastBid = $this->bids->last()) {
            return $lastBid->price;
        }

        return $this->lot->start_price;
    }
}