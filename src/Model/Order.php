<?php


namespace IntegraCommerce\Model;

use Carbon\Carbon;
use IntegraCommerce\Classes\Collection;
use IntegraCommerce\Classes\ModelBase;
use IntegraCommerce\Helper\General;

class Order extends ModelBase
{
    protected static $attributeMap = [
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
    ];

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
    protected $purchasedDate;

    /**
     * @var string
     */
    protected $approvedDate;

    /**
     * @var string
     */
    protected $updatedDate;

    /**
     * @var string
     */
    protected $marketplaceName;

    /**
     * @var string
     */
    protected $storeName;

    /**
     * @var bool
     */
    protected $updatedMarketplaceStatus;

    /**
     * @var bool
     */
    protected $insertedErp;

    /**
     * @var string
     */
    protected $estimatedDeliveryDate;

    /**
     * @var string
     */
    protected $customerPfCpf;

    /**
     * @var string
     */
    protected $receiverName;

    /**
     * @var string
     */
    protected $customerPfName;

    /**
     * @var string
     */
    protected $customerPjCnpj;

    /**
     * @var string
     */
    protected $customerPjCorporatename;

    /**
     * @var string
     */
    protected $deliveryAddressStreet;

    /**
     * @var string
     */
    protected $deliveryAddressAdditionalInfo;

    /**
     * @var string
     */
    protected $deliveryAddressZipcode;

    /**
     * @var string
     */
    protected $deliveryAddressNeighborhood;

    /**
     * @var string
     */
    protected $deliveryAddressCity;

    /**
     * @var string
     */
    protected $deliveryAddressReference;

    /**
     * @var string
     */
    protected $deliveryAddressState;

    /**
     * @var string
     */
    protected $deliveryAddressNumber;

    /**
     * @var string
     */
    protected $telephoneMainNumber;

    /**
     * @var string
     */
    protected $telephoneSecundaryNumber;

    /**
     * @var string
     */
    protected $telephoneBusinessNumber;

    /**
     * @var string
     */
    protected $totalAmount;

    /**
     * @var string
     */
    protected $totalTax;

    /**
     * @var string
     */
    protected $totalFreight;

    /**
     * @var string
     */
    protected $totalDiscount;

    /**
     * @var string
     */
    protected $customerMail;

    /**
     * @var string
     */
    protected $customerBirthDate;

    /**
     * @var string
     */
    protected $customerPjIe;

    /**
     * @var string
     */
    protected $orderStatus;

    /**
     * @var string
     */
    protected $invoicedNumber;

    /**
     * @var int
     */
    protected $invoicedLine;

    /**
     * @var string
     */
    protected $invoicedIssueDate;

    /**
     * @var string
     */
    protected $invoicedKey;

    /**
     * @var string
     */
    protected $invoicedDanfeXml;

    /**
     * @var string
     */
    protected $shippedTrackingUrl;

    /**
     * @var string
     */
    protected $shippedTrackingProtocol;

    /**
     * @var string
     */
    protected $shippedEstimatedDelivery;

    /**
     * @var string
     */
    protected $shippedCarrierDate;

    /**
     * @var string
     */
    protected $shippedCarrierName;

    /**
     * @var string
     */
    protected $shipmentExceptionObservation;

    /**
     * @var string
     */
    protected $shipmentExceptionOccurrenceDate;

    /**
     * @var string
     */
    protected $deliveredDate;

    /**
     * @var string
     */
    protected $shippedCodeERP;

    /**
     * @var Collection[OrderProduct]
     */
    protected $products;

    /**
     * @var Collection[OrderPayment]
     */
    protected $payments;

    public function __construct(\StdClass $order = null)
    {
        if ($order) {
            $this->idOrder = $order->IdOrder;
            $this->idOrderMarketplace = $order->IdOrderMarketplace;
            $this->insertedDate = $order->InsertedDate;
            $this->purchasedDate = $order->PurchasedDate;
            $this->approvedDate = $order->ApprovedDate;
            $this->updatedDate = $order->UpdatedDate;
            $this->marketplaceName = $order->MarketplaceName;
            $this->storeName = $order->StoreName;
            $this->updatedMarketplaceStatus = $order->UpdatedMarketplaceStatus;
            $this->insertedErp = $order->InsertedErp;
            $this->estimatedDeliveryDate = $order->EstimatedDeliveryDate;
            $this->customerPfCpf = $order->CustomerPfCpf;
            $this->receiverName = $order->ReceiverName;
            $this->customerPfName = $order->CustomerPfName;
            $this->customerPjCnpj = $order->CustomerPjCnpj;
            $this->customerPjCorporatename = $order->CustomerPjCorporatename;
            $this->deliveryAddressStreet = $order->DeliveryAddressStreet;
            $this->deliveryAddressAdditionalInfo = $order->DeliveryAddressAdditionalInfo;
            $this->deliveryAddressZipcode = $order->DeliveryAddressZipcode;
            $this->deliveryAddressNeighborhood = $order->DeliveryAddressNeighborhood;
            $this->deliveryAddressCity = $order->DeliveryAddressCity;
            $this->deliveryAddressReference = $order->DeliveryAddressReference;
            $this->deliveryAddressState = $order->DeliveryAddressState;
            $this->deliveryAddressNumber = $order->DeliveryAddressNumber;
            $this->telephoneMainNumber = $order->TelephoneMainNumber;
            $this->telephoneSecundaryNumber = $order->TelephoneSecundaryNumber;
            $this->telephoneBusinessNumber = $order->TelephoneBusinessNumber;
            $this->totalAmount = $order->TotalAmount;
            $this->totalTax = $order->TotalTax;
            $this->totalFreight = $order->TotalFreight;
            $this->totalDiscount = $order->TotalDiscount;
            $this->customerMail = $order->CustomerMail;
            $this->customerBirthDate = $order->CustomerBirthDate;
            $this->customerPjIe = $order->CustomerPjIe;
            $this->orderStatus = $order->OrderStatus;
            $this->invoicedNumber = $order->InvoicedNumber;
            $this->invoicedLine = $order->InvoicedLine;
            $this->invoicedIssueDate = $order->InvoicedIssueDate;
            $this->invoicedKey = $order->InvoicedKey;
            $this->invoicedDanfeXml = $order->InvoicedDanfeXml;
            $this->shippedTrackingUrl = $order->ShippedTrackingUrl;
            $this->shippedTrackingProtocol = $order->ShippedTrackingProtocol;
            $this->shippedEstimatedDelivery = $order->ShippedEstimatedDelivery;
            $this->shippedCarrierDate = $order->ShippedCarrierDate;
            $this->shippedCarrierName = $order->ShippedCarrierName;
            $this->shipmentExceptionObservation = $order->ShipmentExceptionObservation;
            $this->shipmentExceptionOccurrenceDate = $order->ShipmentExceptionOccurrenceDate;
            $this->deliveredDate = $order->DeliveredDate;
            $this->shippedCodeERP = $order->ShippedCodeERP;

            $this->setProducts(new Collection());
            foreach ($order->Products as $product) {
                $this->getProducts()->push(new OrderProduct($product));
            }

            $this->setPayments(new Collection());
            foreach ($order->Payments as $payment) {
                $this->getPayments()->push(new OrderPayment($payment));
            }
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
    public function getIdOrderMarketplace(): string
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
    public function getInsertedDate(): Carbon
    {
        return Carbon::createFromTimeString($this->insertedDate);
    }

    /**
     * @param string $insertedDate
     */
    public function setInsertedDate(string $insertedDate): void
    {
        $this->insertedDate = $insertedDate;
    }

    /**
     * @return Carbon|null
     */
    public function getPurchasedDate()
    {
        return $this->purchasedDate ? Carbon::createFromTimeString($this->purchasedDate) : null;
    }

    /**
     * @param string $purchasedDate
     */
    public function setPurchasedDate(string $purchasedDate): void
    {
        $this->purchasedDate = $purchasedDate;
    }

    /**
     * @return Carbon|null
     */
    public function getApprovedDate()
    {
        return $this->approvedDate ? Carbon::createFromTimeString($this->approvedDate) : null;
    }

    /**
     * @param string $approvedDate
     */
    public function setApprovedDate(string $approvedDate): void
    {
        $this->approvedDate = $approvedDate;
    }

    /**
     * @return Carbon|null
     */
    public function getUpdatedDate()
    {
        return $this->updatedDate ? Carbon::createFromTimeString($this->updatedDate) : null;
    }

    /**
     * @param string $updatedDate
     */
    public function setUpdatedDate(string $updatedDate): void
    {
        $this->updatedDate = $updatedDate;
    }

    /**
     * @return string
     */
    public function getMarketplaceName(): string
    {
        return $this->marketplaceName;
    }

    /**
     * @param string $marketplaceName
     */
    public function setMarketplaceName(string $marketplaceName): void
    {
        $this->marketplaceName = $marketplaceName;
    }

    /**
     * @return string
     */
    public function getStoreName(): string
    {
        return $this->storeName;
    }

    /**
     * @param string $storeName
     */
    public function setStoreName(string $storeName): void
    {
        $this->storeName = $storeName;
    }

    /**
     * @return bool
     */
    public function isUpdatedMarketplaceStatus(): bool
    {
        return $this->updatedMarketplaceStatus;
    }

    /**
     * @param bool $updatedMarketplaceStatus
     */
    public function setUpdatedMarketplaceStatus(bool $updatedMarketplaceStatus): void
    {
        $this->updatedMarketplaceStatus = $updatedMarketplaceStatus;
    }

    /**
     * @return bool
     */
    public function isInsertedErp(): bool
    {
        return $this->insertedErp;
    }

    /**
     * @param bool $insertedErp
     */
    public function setInsertedErp(bool $insertedErp): void
    {
        $this->insertedErp = $insertedErp;
    }

    /**
     * @return Carbon|null
     */
    public function getEstimatedDeliveryDate()
    {
        return $this->estimatedDeliveryDate ? Carbon::createFromTimeString($this->estimatedDeliveryDate) : null;
    }

    /**
     * @param string $estimatedDeliveryDate
     */
    public function setEstimatedDeliveryDate(string $estimatedDeliveryDate): void
    {
        $this->estimatedDeliveryDate = $estimatedDeliveryDate;
    }

    /**
     * @return string
     */
    public function getCustomerPfCpf(): string
    {
        return $this->customerPfCpf;
    }

    /**
     * @param string $customerPfCpf
     */
    public function setCustomerPfCpf(string $customerPfCpf): void
    {
        $this->customerPfCpf = $customerPfCpf;
    }

    /**
     * @return string
     */
    public function getReceiverName(): string
    {
        return $this->receiverName;
    }

    /**
     * @param string $receiverName
     */
    public function setReceiverName(string $receiverName): void
    {
        $this->receiverName = $receiverName;
    }

    /**
     * @return string
     */
    public function getCustomerPfName()
    {
        return $this->customerPfName;
    }

    /**
     * @param string $customerPfName
     */
    public function setCustomerPfName(string $customerPfName): void
    {
        $this->customerPfName = $customerPfName;
    }

    /**
     * @return string
     */
    public function getCustomerPjCnpj()
    {
        return $this->customerPjCnpj;
    }

    /**
     * @param string $customerPjCnpj
     */
    public function setCustomerPjCnpj(string $customerPjCnpj): void
    {
        $this->customerPjCnpj = $customerPjCnpj;
    }

    /**
     * @return string
     */
    public function getCustomerPjCorporatename()
    {
        return $this->customerPjCorporatename;
    }

    /**
     * @param string $customerPjCorporatename
     */
    public function setCustomerPjCorporatename(string $customerPjCorporatename): void
    {
        $this->customerPjCorporatename = $customerPjCorporatename;
    }

    /**
     * @return string
     */
    public function getDeliveryAddressStreet(): string
    {
        return $this->deliveryAddressStreet;
    }

    /**
     * @param string $deliveryAddressStreet
     */
    public function setDeliveryAddressStreet(string $deliveryAddressStreet): void
    {
        $this->deliveryAddressStreet = $deliveryAddressStreet;
    }

    /**
     * @return string
     */
    public function getDeliveryAddressAdditionalInfo(): string
    {
        return $this->deliveryAddressAdditionalInfo;
    }

    /**
     * @param string $deliveryAddressAdditionalInfo
     */
    public function setDeliveryAddressAdditionalInfo(string $deliveryAddressAdditionalInfo): void
    {
        $this->deliveryAddressAdditionalInfo = $deliveryAddressAdditionalInfo;
    }

    /**
     * @return string
     */
    public function getDeliveryAddressZipcode(): string
    {
        return $this->deliveryAddressZipcode;
    }

    /**
     * @param string $deliveryAddressZipcode
     */
    public function setDeliveryAddressZipcode(string $deliveryAddressZipcode): void
    {
        $this->deliveryAddressZipcode = $deliveryAddressZipcode;
    }

    /**
     * @return string
     */
    public function getDeliveryAddressNeighborhood(): string
    {
        return $this->deliveryAddressNeighborhood;
    }

    /**
     * @param string $deliveryAddressNeighborhood
     */
    public function setDeliveryAddressNeighborhood(string $deliveryAddressNeighborhood): void
    {
        $this->deliveryAddressNeighborhood = $deliveryAddressNeighborhood;
    }

    /**
     * @return string
     */
    public function getDeliveryAddressCity(): string
    {
        return $this->deliveryAddressCity;
    }

    /**
     * @param string $deliveryAddressCity
     */
    public function setDeliveryAddressCity(string $deliveryAddressCity): void
    {
        $this->deliveryAddressCity = $deliveryAddressCity;
    }

    /**
     * @return string
     */
    public function getDeliveryAddressReference()
    {
        return $this->deliveryAddressReference;
    }

    /**
     * @param string $deliveryAddressReference
     */
    public function setDeliveryAddressReference(string $deliveryAddressReference): void
    {
        $this->deliveryAddressReference = $deliveryAddressReference;
    }

    /**
     * @return string
     */
    public function getDeliveryAddressState()
    {
        return $this->deliveryAddressState;
    }

    /**
     * @param string $deliveryAddressState
     */
    public function setDeliveryAddressState(string $deliveryAddressState): void
    {
        $this->deliveryAddressState = $deliveryAddressState;
    }

    /**
     * @return string
     */
    public function getDeliveryAddressNumber()
    {
        return $this->deliveryAddressNumber;
    }

    /**
     * @param string $deliveryAddressNumber
     */
    public function setDeliveryAddressNumber(string $deliveryAddressNumber): void
    {
        $this->deliveryAddressNumber = $deliveryAddressNumber;
    }

    /**
     * @return string
     */
    public function getTelephoneMainNumber(): string
    {
        return $this->telephoneMainNumber;
    }

    /**
     * @param string $telephoneMainNumber
     */
    public function setTelephoneMainNumber(string $telephoneMainNumber): void
    {
        $this->telephoneMainNumber = $telephoneMainNumber;
    }

    /**
     * @return string
     */
    public function getTelephoneSecundaryNumber(): string
    {
        return $this->telephoneSecundaryNumber;
    }

    /**
     * @param string $telephoneSecundaryNumber
     */
    public function setTelephoneSecundaryNumber(string $telephoneSecundaryNumber): void
    {
        $this->telephoneSecundaryNumber = $telephoneSecundaryNumber;
    }

    /**
     * @return string
     */
    public function getTelephoneBusinessNumber(): string
    {
        return $this->telephoneBusinessNumber;
    }

    /**
     * @param string $telephoneBusinessNumber
     */
    public function setTelephoneBusinessNumber(string $telephoneBusinessNumber): void
    {
        $this->telephoneBusinessNumber = $telephoneBusinessNumber;
    }

    /**
     * @return float
     */
    public function getTotalAmount(): float
    {
        return General::convertStringToFloat($this->totalAmount);
    }

    /**
     * @param string $totalAmount
     */
    public function setTotalAmount(string $totalAmount): void
    {
        $this->totalAmount = $totalAmount;
    }

    /**
     * @return float
     */
    public function getTotalTax(): float
    {
        return General::convertStringToFloat($this->totalTax);
    }

    /**
     * @param string $totalTax
     */
    public function setTotalTax(string $totalTax): void
    {
        $this->totalTax = $totalTax;
    }

    /**
     * @return float
     */
    public function getTotalFreight(): float
    {
        return General::convertStringToFloat($this->totalFreight);
    }

    /**
     * @param string $totalFreight
     */
    public function setTotalFreight(string $totalFreight): void
    {
        $this->totalFreight = $totalFreight;
    }

    /**
     * @return float
     */
    public function getTotalDiscount(): float
    {
        return General::convertStringToFloat($this->totalDiscount);
    }

    /**
     * @param string $totalDiscount
     */
    public function setTotalDiscount(string $totalDiscount): void
    {
        $this->totalDiscount = $totalDiscount;
    }

    /**
     * @return string
     */
    public function getCustomerMail()
    {
        return $this->customerMail;
    }

    /**
     * @param string $customerMail
     */
    public function setCustomerMail(string $customerMail): void
    {
        $this->customerMail = $customerMail;
    }

    /**
     * @return Carbon|null
     */
    public function getCustomerBirthDate()
    {
        return $this->customerBirthDate ? Carbon::createFromFormat('d/m/Y', $this->customerBirthDate) : null;
    }

    /**
     * @param string $customerBirthDate
     */
    public function setCustomerBirthDate(string $customerBirthDate): void
    {
        $this->customerBirthDate = $customerBirthDate;
    }

    /**
     * @return string
     */
    public function getCustomerPjIe()
    {
        return $this->customerPjIe;
    }

    /**
     * @param string $customerPjIe
     */
    public function setCustomerPjIe(string $customerPjIe): void
    {
        $this->customerPjIe = $customerPjIe;
    }

    /**
     * @return string
     */
    public function getOrderStatus(): string
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
     * @return string
     */
    public function getInvoicedNumber()
    {
        return $this->invoicedNumber;
    }

    /**
     * @param string $invoicedNumber
     */
    public function setInvoicedNumber(string $invoicedNumber): void
    {
        $this->invoicedNumber = $invoicedNumber;
    }

    /**
     * @return int
     */
    public function getInvoicedLine()
    {
        return $this->invoicedLine;
    }

    /**
     * @param int $invoicedLine
     */
    public function setInvoicedLine(int $invoicedLine): void
    {
        $this->invoicedLine = $invoicedLine;
    }

    /**
     * @return Carbon|null
     */
    public function getInvoicedIssueDate()
    {
        return $this->invoicedIssueDate ? Carbon::createFromTimeString($this->invoicedIssueDate) : null;
    }

    /**
     * @param string $invoicedIssueDate
     */
    public function setInvoicedIssueDate(string $invoicedIssueDate): void
    {
        $this->invoicedIssueDate = $invoicedIssueDate;
    }

    /**
     * @return string
     */
    public function getInvoicedKey()
    {
        return $this->invoicedKey;
    }

    /**
     * @param string $invoicedKey
     */
    public function setInvoicedKey(string $invoicedKey): void
    {
        $this->invoicedKey = $invoicedKey;
    }

    /**
     * @return string
     */
    public function getInvoicedDanfeXml()
    {
        return $this->invoicedDanfeXml;
    }

    /**
     * @param string $invoicedDanfeXml
     */
    public function setInvoicedDanfeXml(string $invoicedDanfeXml): void
    {
        $this->invoicedDanfeXml = $invoicedDanfeXml;
    }

    /**
     * @return string
     */
    public function getShippedTrackingUrl()
    {
        return $this->shippedTrackingUrl;
    }

    /**
     * @param string $shippedTrackingUrl
     */
    public function setShippedTrackingUrl(string $shippedTrackingUrl): void
    {
        $this->shippedTrackingUrl = $shippedTrackingUrl;
    }

    /**
     * @return string
     */
    public function getShippedTrackingProtocol()
    {
        return $this->shippedTrackingProtocol;
    }

    /**
     * @param string $shippedTrackingProtocol
     */
    public function setShippedTrackingProtocol(string $shippedTrackingProtocol): void
    {
        $this->shippedTrackingProtocol = $shippedTrackingProtocol;
    }

    /**
     * @return string
     */
    public function getShippedEstimatedDelivery()
    {
        return $this->shippedEstimatedDelivery;
    }

    /**
     * @param string $shippedEstimatedDelivery
     */
    public function setShippedEstimatedDelivery(string $shippedEstimatedDelivery): void
    {
        $this->shippedEstimatedDelivery = $shippedEstimatedDelivery;
    }

    /**
     * @return Carbon|null
     */
    public function getShippedCarrierDate()
    {
        return $this->shippedCarrierDate ? Carbon::createFromTimeString($this->shippedCarrierDate) : null;
    }

    /**
     * @param string $shippedCarrierDate
     */
    public function setShippedCarrierDate(string $shippedCarrierDate): void
    {
        $this->shippedCarrierDate = $shippedCarrierDate;
    }

    /**
     * @return string
     */
    public function getShippedCarrierName()
    {
        return $this->shippedCarrierName;
    }

    /**
     * @param string $shippedCarrierName
     */
    public function setShippedCarrierName(string $shippedCarrierName): void
    {
        $this->shippedCarrierName = $shippedCarrierName;
    }

    /**
     * @return string
     */
    public function getShipmentExceptionObservation()
    {
        return $this->shipmentExceptionObservation;
    }

    /**
     * @param string $shipmentExceptionObservation
     */
    public function setShipmentExceptionObservation(string $shipmentExceptionObservation): void
    {
        $this->shipmentExceptionObservation = $shipmentExceptionObservation;
    }

    /**
     * @return Carbon|null
     */
    public function getShipmentExceptionOccurrenceDate()
    {
        return $this->shipmentExceptionOccurrenceDate ? Carbon::createFromTimeString($this->shipmentExceptionOccurrenceDate) : null;
    }

    /**
     * @param string $shipmentExceptionOccurrenceDate
     */
    public function setShipmentExceptionOccurrenceDate(string $shipmentExceptionOccurrenceDate): void
    {
        $this->shipmentExceptionOccurrenceDate = $shipmentExceptionOccurrenceDate;
    }

    /**
     * @return Carbon|null
     */
    public function getDeliveredDate()
    {
        return $this->deliveredDate ? Carbon::createFromTimeString($this->deliveredDate) : null;
    }

    /**
     * @param string $deliveredDate
     */
    public function setDeliveredDate(string $deliveredDate): void
    {
        $this->deliveredDate = $deliveredDate;
    }

    /**
     * @return string
     */
    public function getShippedCodeERP(): string
    {
        return $this->shippedCodeERP;
    }

    /**
     * @param string $shippedCodeERP
     */
    public function setShippedCodeERP(string $shippedCodeERP): void
    {
        $this->shippedCodeERP = $shippedCodeERP;
    }

    /**
     * @return Collection
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    /**
     * @param Collection $products
     */
    public function setProducts(Collection $products): void
    {
        $this->products = $products;
    }

    /**
     * @return Collection
     */
    public function getPayments(): Collection
    {
        return $this->payments;
    }

    /**
     * @param Collection $payments
     */
    public function setPayments(Collection $payments): void
    {
        $this->payments = $payments;
    }

    public function toArray(): array
    {
        return [
            'idOrder'                         => $this->getIdOrder(),
            'idOrderMarketplace'              => $this->getIdOrderMarketplace(),
            'insertedDate'                    => $this->getInsertedDate(),
            'purchasedDate'                   => $this->getPurchasedDate(),
            'approvedDate'                    => $this->getApprovedDate(),
            'updatedDate'                     => $this->getUpdatedDate(),
            'marketplaceName'                 => $this->getMarketplaceName(),
            'storeName'                       => $this->getStoreName(),
            'updatedMarketplaceStatus'        => $this->isUpdatedMarketplaceStatus(),
            'insertedErp'                     => $this->isInsertedErp(),
            'estimatedDeliveryDate'           => $this->getEstimatedDeliveryDate(),
            'customerPfCpf'                   => $this->getCustomerPfCpf(),
            'receiverName'                    => $this->getReceiverName(),
            'customerPfName'                  => $this->getCustomerPfName(),
            'customerPjCnpj'                  => $this->getCustomerPjCnpj(),
            'customerPjCorporatename'         => $this->getCustomerPjCorporatename(),
            'deliveryAddressStreet'           => $this->getDeliveryAddressStreet(),
            'deliveryAddressAdditionalInfo'   => $this->getDeliveryAddressAdditionalInfo(),
            'deliveryAddressZipcode'          => $this->getDeliveryAddressZipcode(),
            'deliveryAddressNeighborhood'     => $this->getDeliveryAddressNeighborhood(),
            'deliveryAddressCity'             => $this->getDeliveryAddressCity(),
            'deliveryAddressReference'        => $this->getDeliveryAddressReference(),
            'deliveryAddressState'            => $this->getDeliveryAddressState(),
            'deliveryAddressNumber'           => $this->getDeliveryAddressNumber(),
            'telephoneMainNumber'             => $this->getTelephoneMainNumber(),
            'telephoneSecundaryNumber'        => $this->getTelephoneSecundaryNumber(),
            'telephoneBusinessNumber'         => $this->getTelephoneBusinessNumber(),
            'totalAmount'                     => $this->getTotalAmount(),
            'totalTax'                        => $this->getTotalTax(),
            'totalFreight'                    => $this->getTotalFreight(),
            'totalDiscount'                   => $this->getTotalDiscount(),
            'customerMail'                    => $this->getCustomerMail(),
            'customerBirthDate'               => $this->getCustomerBirthDate(),
            'customerPjIe'                    => $this->getCustomerPjIe(),
            'orderStatus'                     => $this->getOrderStatus(),
            'invoicedNumber'                  => $this->getInvoicedNumber(),
            'invoicedLine'                    => $this->getInvoicedLine(),
            'invoicedIssueDate'               => $this->getInvoicedIssueDate(),
            'invoicedKey'                     => $this->getInvoicedKey(),
            'invoicedDanfeXml'                => $this->getInvoicedDanfeXml(),
            'shippedTrackingUrl'              => $this->getShippedTrackingUrl(),
            'shippedTrackingProtocol'         => $this->getShippedTrackingProtocol(),
            'shippedEstimatedDelivery'        => $this->getShippedEstimatedDelivery(),
            'shippedCarrierDate'              => $this->getShippedCarrierDate(),
            'shippedCarrierName'              => $this->getShippedCarrierName(),
            'shipmentExceptionObservation'    => $this->getShipmentExceptionObservation(),
            'shipmentExceptionOccurrenceDate' => $this->getShipmentExceptionOccurrenceDate(),
            'deliveredDate'                   => $this->getDeliveredDate(),
            'shippedCodeERP'                  => $this->getShippedCodeERP(),
        ];
    }
}