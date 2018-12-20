<?php


namespace IntegraCommerce\Model;

use IntegraCommerce\Classes\ModelBase;
use IntegraCommerce\Helper\General;

class OrderProduct extends ModelBase
{
    public static $attributeMap = [
        'IdSku'          => 'string',
        'Quantity'       => 0,
        'Price'          => 'string',
        'Freight'        => 'string',
        'Discount'       => 'string',
        'IdOrderPackage' => 0,
    ];

    /**
     * @var string
     */
    protected $idSku;

    /**
     * @var int
     */
    protected $quantity;

    /**
     * @var string
     */
    protected $price;

    /**
     * @var string
     */
    protected $freight;

    /**
     * @var string
     */
    protected $discount;

    /**
     * @var int
     */
    protected $idOrderPackage;

    public function __construct(\StdClass $product)
    {
        if ($product) {
            $this->idSku = $product->IdSku;
            $this->quantity = $product->Quantity;
            $this->price = $product->Price;
            $this->freight = $product->Freight;
            $this->discount = $product->Discount;
            $this->idOrderPackage = $product->IdOrderPackage;
        }
    }

    /**
     * @return string
     */
    public function getIdSku(): string
    {
        return $this->idSku;
    }

    /**
     * @param string $idSku
     */
    public function setIdSku(string $idSku): void
    {
        $this->idSku = $idSku;
    }

    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return General::convertStringToFloat($this->price);
    }

    /**
     * @param string $price
     */
    public function setPrice(string $price): void
    {
        $this->price = $price;
    }

    /**
     * @return float
     */
    public function getFreight(): float
    {
        return General::convertStringToFloat($this->freight);
    }

    /**
     * @param string $freight
     */
    public function setFreight(string $freight): void
    {
        $this->freight = $freight;
    }

    /**
     * @return string
     */
    public function getDiscount(): string
    {
        return General::convertStringToFloat($this->discount);
    }

    /**
     * @param string $discount
     */
    public function setDiscount(string $discount): void
    {
        $this->discount = $discount;
    }

    /**
     * @return int
     */
    public function getIdOrderPackage(): int
    {
        return $this->idOrderPackage;
    }

    /**
     * @param int $idOrderPackage
     */
    public function setIdOrderPackage(int $idOrderPackage): void
    {
        $this->idOrderPackage = $idOrderPackage;
    }

    /**
     * @return float
     */
    public function getTotal(): float
    {
        return $this->getPrice() * $this->getQuantity();
    }
}