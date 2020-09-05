<?php

namespace kosuha606\Declarative\Cart;

use kosuha606\Declarative\Common\Collection;
use kosuha606\Declarative\Common\Entity;

/**
 * @package kosuha606\Declarative\Cart
 */
class CartApplication
{
    /** @var Collection */
    private $cart;

    /** @var Collection */
    private $discounts;

    /**
     * CartApplication constructor.
     */
    public function __construct()
    {
        $this->cart = new Collection();
        $this->discounts = new Collection();
    }

    /**
     * Добавить продукт в корзину
     *
     * @param $id
     * @param $name
     * @param $price
     * @param $size
     * @param $qty
     */
    public function addProduct($id, $name, $price, $size, $qty)
    {
        $this->cart->add(new Entity('id', compact('id', 'name', 'price', 'size', 'qty')));
    }

    /**
     * Добавить скидку
     *
     * @param $sum
     */
    public function addDiscount($sum)
    {
        $discountsCount = $this->discounts->count();
        $this->discounts->add(new Entity($discountsCount + 1, compact('sum')));
    }

    /**
     * Итог корзины
     *
     * @return float|int
     */
    public function cartTotal()
    {
        return array_sum(
            $this->cart->map(
                function (Entity $entity) {
                    return $entity->price * $entity->qty;
                }
            )
        );
    }

    /**
     * Общая сумма скидки
     *
     * @return float|int
     */
    public function discountTotal()
    {
        return array_sum(
            $this->discounts->map(
                function (Entity $entity) {
                    return $entity->sum;
                }
            )
        );
    }

    /**
     * Итог корзины с учетом скидки
     *
     * @return float|int
     */
    public function cartTotalWithDiscount()
    {
        $total = $this->cartTotal() - $this->discountTotal();

        return $total > 0 ? $total : 0;
    }

    /**
     * @return Collection
     */
    public function getCart()
    {
        return $this->cart;
    }
}