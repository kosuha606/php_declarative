<?php

namespace kosuha606\Declarative\Auction;

use kosuha606\Declarative\Common\Collection;
use kosuha606\Declarative\Common\ReceiptEntityFactory;

class AuctionApp
{
    /** @var ReceiptEntityFactory */
    private $entityFactory;

    /** @var Collection */
    private $lots;

    /** @var LotWorkflow[] */
    private $workflows;

    public function __construct(
        ReceiptEntityFactory $entityFactory
    ) {
        $this->entityFactory = $entityFactory;
        $this->lots = new Collection();
    }

    /**
     * @param $id
     * @param $name
     * @param $desctiption
     * @param $startPrice
     * @throws \Exception
     */
    public function addLot($id, $name, $desctiption, $startPrice)
    {
        $this->lots->add($this->entityFactory->createEntity('lot', 'id', [
            'id' => $id,
            'name' => $name,
            'description' => $desctiption,
            'start_price' => $startPrice,
        ]));
    }

    /**
     * @param $lotId
     * @return LotWorkflow
     * @throws \Exception
     */
    public function lotWorkflow($lotId)
    {
        $lot = $this->lots->get($lotId);

        if (!$lot) {
            throw new \Exception("No lot with id $lotId");
        }

        if (!isset($this->workflows[$lotId])) {
            $this->workflows[$lotId] = new LotWorkflow($lot, $this->entityFactory);
        }

        return $this->workflows[$lotId];
    }

    public function getLots()
    {
        return $this->lots;
    }
}