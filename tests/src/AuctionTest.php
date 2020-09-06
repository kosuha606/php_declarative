<?php

use kosuha606\Declarative\Auction\AuctionApp;
use kosuha606\Declarative\Common\ReceiptEntityFactory;
use kosuha606\Declarative\Common\Storage;
use kosuha606\Declarative\Game\RPG\Application;
use PHPUnit\Framework\TestCase;

class AuctionTest extends TestCase
{
    /**
     * @throws Exception
     */
    public function testMain()
    {
        $receipts = (new Storage())->readFile(__DIR__.'/../../src/Auction/data/entities.php');
        $receiptFactory = new ReceiptEntityFactory($receipts);
        $auctionApp = new AuctionApp($receiptFactory);

        $auctionApp->addLot(1, 'Диван', 'Хорошее состояние', 4500);
        $auctionApp->addLot(2, 'Телевизор', 'Хорошее состояние', 14500);

        $this->assertEquals(2, $auctionApp->getLots()->count());

        $user = $receiptFactory->createEntity('user', 'id', [
            'id' => 1,
            'name' => 'Евгений',
        ]);
        $user2 = $receiptFactory->createEntity('user', 'id', [
            'id' => 2,
            'name' => 'Анатолий',
        ]);

        $this->assertEquals(4500, $auctionApp->lotWorkflow(1)->auctionPrice());

        $auctionApp->lotWorkflow(1)->addBid($user, 6000);
        $auctionApp->lotWorkflow(1)->addBid($user2, 7000);
        $auctionApp->lotWorkflow(1)->addBid($user, 9000);

        $this->assertEquals(9000, $auctionApp->lotWorkflow(1)->auctionPrice());
    }
}