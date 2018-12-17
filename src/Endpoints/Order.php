<?php

namespace IntegraCommerce\Endpoints;

use IntegraCommerce\Classes\EndpointBase;
use IntegraCommerce\Model\Orders;
use \IntegraCommerce\Model\Order as OrderModel;
use \IntegraCommerce\Model\Orders as OrdersModel;

class Order extends EndpointBase
{
    const ORDER_STATUS_NEW = 'New';
    const ORDER_STATUS_APPROVED = 'Approved';
    const ORDER_STATUS_PROCESSING = 'Processing';
    const ORDER_STATUS_INVOICED = 'Invoiced';
    const ORDER_STATUS_SHIPPED = 'Shipped';
    const ORDER_STATUS_DELIVERED = 'Delivered';
    const ORDER_STATUS_CANCELED = 'Canceled';
    const ORDER_STATUS_SHIPMENT_EXCEPTION = 'ShipmentException';

    /**
     * Método utilizado para recuperar uma categoria pelo ID.
     * @see https://api.integracommerce.com.br/swagger/ui/index#!/Order/Order_GetById
     *
     * @param string $id Id da categoria
     * @return OrderModel
     */
    public function getOrderById(string $id): OrderModel
    {
        $response = $this->request('GET', 'Order/' . $id)->getResponse();
        return new OrderModel($response);
    }

    public function createOrders(Orders $categories)
    {
        $this->request('POST', 'Order', [
            'json' => $categories->getOrders()->toArray()
        ]);
    }

    /**
     * Método utilizado para recuperar todos pedidos do Integra.
     * Os possíveis status são: New, Approved, Processing, Invoiced, Shipped, Delivered, Canceled, ShipmentException.
     * @see https://api.integracommerce.com.br/swagger/ui/index#!/Order/Order_GetAll
     *
     * @param int $page Página atual
     * @param int $perPage Itens por página
     * @param string $status Status do pedido
     * @return OrdersModel
     */
    public function getOrders(int $page = 1, int $perPage = 100, $status = null): OrdersModel
    {
        $query = [
            'page'    => $page,
            'perPage' => $perPage
        ];

        if ($status) {
            $query['status'] = $status;
        }

        $response = $this->request('GET', 'Order', [
            'query' => $query
        ])->getResponse();

        return new OrdersModel($response);
    }
}