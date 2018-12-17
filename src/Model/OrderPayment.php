<?php


namespace IntegraCommerce\Model;

use IntegraCommerce\Classes\ModelBase;

class OrderPayment extends ModelBase
{
    public static $attributeMap = [
        'Name'         => 'string',
        'Installments' => 0,
        'Amount'       => 0,
    ];

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $installments;

    /**
     * @var int
     */
    protected $amount;

    public function __construct(\StdClass $payment)
    {
        if ($payment) {
            $this->name = $payment->Name;
            $this->installments = $payment->Installments;
            $this->amount = $payment->Amount;
        }
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getInstallments(): int
    {
        return $this->installments;
    }

    /**
     * @param int $installments
     */
    public function setInstallments(int $installments): void
    {
        $this->installments = $installments;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }
}