<?php

use kosuha606\Declarative\Cart\CartApplication;
use PHPUnit\Framework\TestCase;

class FirstTest extends TestCase
{
    public function testApp()
    {
        $cartApp = new CartApplication();
        $cartApp->addProduct(1, 'Блузка', 2000, 'XL', 2);

        $this->assertEquals(4000, $cartApp->cartTotal());

        $cartApp->addDiscount(1000);

        $this->assertEquals(4000, $cartApp->cartTotal());
        $this->assertEquals(3000, $cartApp->cartTotalWithDiscount());

        $cartApp->getCart()->clear();
        $this->assertEquals(0, $cartApp->cartTotal());
    }
}