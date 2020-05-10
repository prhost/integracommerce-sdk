<?php


namespace Integracommerce\Model;

use Integracommerce\Classes\Collection;
use Integracommerce\Classes\ModelBase;
use Integracommerce\Traits\Paginable;

class OrderQueues extends ModelBase
{
    use Paginable;

    protected static $attributeMap = [
        'Total'       => 0,
        'OrderQueues' =>
            [
                'Id'                 => 0,
                'IdOrder'            => 'string',
                'IdOrderMarketplace' => 'string',
                'InsertedDate'       => '2018-12-14T00:03:51.161Z',
                'OrderStatus'        => 'string',
            ],
    ];

    /**
     * @var Collection[OrderQueue]
     */
    protected $orderQueues;

    public function __construct(\StdClass $data = null)
    {
        $this->orderQueues = new Collection();

        if ($data) {
            $this->total = $data->Total;

            if ($data->OrderQueues) {
                foreach ($data->OrderQueues as $orderQueue) {
                    $this->orderQueues->push(new OrderQueue($orderQueue));
                }
            }
        }
    }

    /**
     * @return Collection[OrderQueue]
     */
    public function getOrderQueues(): Collection
    {
        return $this->orderQueues;
    }

    /**
     * @param Collection[OrderQueue] $orders
     */
    public function setOrderQueues(Collection $orderQueues): void
    {
        $this->orderQueues = $orderQueues;
    }

    public function setOrderQueue(OrderQueue $orderQueue)
    {
        if (null === $this->orderQueues) {
            $this->orderQueues = new Collection();
        }

        $this->orders->push($orderQueue);
    }
}