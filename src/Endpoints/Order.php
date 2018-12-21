<?php

namespace IntegraCommerce\Endpoints;

use IntegraCommerce\Classes\EndpointBase;
use IntegraCommerce\Model\Orders;
use \IntegraCommerce\Model\Order as OrderModel;
use \IntegraCommerce\Model\Orders as OrdersModel;

class Order extends EndpointBase
{
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

    public function createOrders(Orders $orders)
    {
        $this->request('POST', 'Order', [
            'json' => $orders->getOrders()->toArray()
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

    public function updateOrder(\IntegraCommerce\Model\Order $order)
    {
        $this->request('PUT', 'Order', [
            'json' => $order->toArray()
        ]);
    }
}