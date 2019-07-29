<?php


namespace Integracommerce\Model;

use Integracommerce\Classes\Collection;
use Integracommerce\Classes\ModelBase;
use Integracommerce\Traits\Paginable;

class Orders extends ModelBase
{
    use Paginable;

    protected static $attributeMap = [
        'Page'    => 0,
        'PerPage' => 0,
        'Total'   => 0,
        'Orders'  =>
            [
                'IdOrder'                         => 'string',
                'IdOrderMarketplace'              => 'string',
                'InsertedDate'                    => '2018-12-14T00:03:51.161Z',
                'PurchasedDate'                   => '2018-12-14T00:03:51.161Z',
                'ApprovedDate'                    => '2018-12-14T00:03:51.161Z',
                'UpdatedDate'                     => '2018-12-14T00:03:51.161Z',
                'MarketplaceName'                 => 'string',
                'StoreName'                       => 'string',
                'UpdatedMarketplaceStatus'        => true,
                'InsertedErp'                     => true,
                'EstimatedDeliveryDate'           => '2018-12-14T00:03:51.161Z',
                'CustomerPfCpf'                   => 'string',
                'ReceiverName'                    => 'string',
                'CustomerPfName'                  => 'string',
                'CustomerPjCnpj'                  => 'string',
                'CustomerPjCorporatename'         => 'string',
                'DeliveryAddressStreet'           => 'string',
                'DeliveryAddressAdditionalInfo'   => 'string',
                'DeliveryAddressZipcode'          => 'string',
                'DeliveryAddressNeighborhood'     => 'string',
                'DeliveryAddressCity'             => 'string',
                'DeliveryAddressReference'        => 'string',
                'DeliveryAddressState'            => 'string',
                'DeliveryAddressNumber'           => 'string',
                'TelephoneMainNumber'             => 'string',
                'TelephoneSecundaryNumber'        => 'string',
                'TelephoneBusinessNumber'         => 'string',
                'TotalAmount'                     => 'string',
                'TotalTax'                        => 'string',
                'TotalFreight'                    => 'string',
                'TotalDiscount'                   => 'string',
                'CustomerMail'                    => 'string',
                'CustomerBirthDate'               => 'string',
                'CustomerPjIe'                    => 'string',
                'OrderStatus'                     => 'string',
                'InvoicedNumber'                  => 'string',
                'InvoicedLine'                    => 0,
                'InvoicedIssueDate'               => '2018-12-14T00:03:51.161Z',
                'InvoicedKey'                     => 'string',
                'InvoicedDanfeXml'                => 'string',
                'ShippedTrackingUrl'              => 'string',
                'ShippedTrackingProtocol'         => 'string',
                'ShippedEstimatedDelivery'        => '2018-12-14T00:03:51.161Z',
                'ShippedCarrierDate'              => '2018-12-14T00:03:51.161Z',
                'ShippedCarrierName'              => 'string',
                'ShipmentExceptionObservation'    => 'string',
                'ShipmentExceptionOccurrenceDate' => '2018-12-14T00:03:51.161Z',
                'DeliveredDate'                   => '2018-12-14T00:03:51.161Z',
                'ShippedCodeERP'                  => 'string',
                'Products'                        =>
                    [
                        'IdSku'          => 'string',
                        'Quantity'       => 0,
                        'Price'          => 'string',
                        'Freight'        => 'string',
                        'Discount'       => 'string',
                        'IdOrderPackage' => 0,
                    ],
                'Payments'                        =>
                    [
                        'Name'         => 'string',
                        'Installments' => 0,
                        'Amount'       => 0,
                    ],
            ],
    ];

    /**
     * @var Collection[Order]
     */
    protected $orders;

    public function __construct(\StdClass $data = null)
    {
        $this->orders = new Collection();

        if ($data) {
            $this->page = $data->Page;
            $this->perPage = $data->PerPage;
            $this->total = $data->Total;

            if ($data->Orders) {
                foreach ($data->Orders as $order) {
                    $this->orders->push(new Order($order));
                }
            }
        }
    }

    /**
     * @return Order[]
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    /**
     * @param Collection[Order] $orders
     */
    public function setOrders(Collection $orders): void
    {
        $this->orders = $orders;
    }

    public function setOrder(Order $order)
    {
        if (null === $this->orders) {
            $this->orders = new Collection();
        }

        $this->orders->push($order);
    }
}