<?php


namespace Integracommerce\Model;

use Carbon\Carbon;
use Integracommerce\Classes\Collection;
use Integracommerce\Classes\ModelBase;
use Integracommerce\Helper\General;

class OrderQueue extends ModelBase
{
    protected static $attributeMap = [
        'Id'                 => 0,
        'IdOrder'            => 'string',
        'IdOrderMarketplace' => 'string',
        'InsertedDate'       => '2018-12-14T00:03:51.161Z',
        'OrderStatus'        => 'string',
    ];

    /**
     * @var int
     */
    protected $id;

    /**
     * @var string
     */
    protected $idOrder;

    /**
     * @var string
     */
    protected $idOrderMarketplace;

    /**
     * @var string
     */
    protected $insertedDate;

    /**
     * @var string
     */
    protected $orderStatus;

    public function __construct(\StdClass $order = null)
    {
        if ($order) {
            $this->id = $order->Id;
            $this->idOrder = $order->IdOrder;
            $this->idOrderMarketplace = $order->IdOrderMarketplace;
            $this->insertedDate = $order->InsertedDate;
            $this->orderStatus = $order->OrderStatus;
        }
    }

    /**
     * @return string
     */
    public function getIdOrder(): string
    {
        return $this->idOrder;
    }

    /**
     * @param string $idOrder
     */
    public function setIdOrder(string $idOrder): void
    {
        $this->idOrder = $idOrder;
    }

    /**
     * @return string
     */
    public function getIdOrderMarketplace(): ?string
    {
        return $this->idOrderMarketplace;
    }

    /**
     * @param string $idOrderMarketplace
     */
    public function setIdOrderMarketplace(string $idOrderMarketplace): void
    {
        $this->idOrderMarketplace = $idOrderMarketplace;
    }

    /**
     * @return Carbon
     */
    public function getInsertedDate(): ?Carbon
    {
        return $this->insertedDate ? Carbon::createFromTimeString($this->insertedDate) : null;
    }

    /**
     * @param string $insertedDate
     */
    public function setInsertedDate(string $insertedDate): void
    {
        $this->insertedDate = $insertedDate;
    }

    /**
     * @return string
     */
    public function getOrderStatus(): ?string
    {
        return $this->orderStatus;
    }

    /**
     * @param string $orderStatus
     */
    public function setOrderStatus(string $orderStatus): void
    {
        $this->orderStatus = $orderStatus;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function toArray(): array
    {
        $order = [];
        if ($this->getId()) {
            $order['Id'] = $this->getId();
        }
        if ($this->getIdOrder()) {
            $order['IdOrder'] = $this->getIdOrder();
        }
        if ($this->getIdOrderMarketplace()) {
            $order['IdOrderMarketplace'] = $this->getIdOrderMarketplace();
        }
        if ($this->getInsertedDate()) {
            $order['InsertedDate'] = $this->getInsertedDate()->toDateTimeString();
        }
        if ($this->getOrderStatus()) {
            $order['OrderStatus'] = $this->getOrderStatus();
        }

        return $order;
    }
}