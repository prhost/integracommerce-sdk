<?php

namespace Integracommerce\Endpoints;

use Integracommerce\Classes\EndpointBase;
use Integracommerce\Model\Orders;
use \Integracommerce\Model\Order as OrderModel;
use \Integracommerce\Model\OrderQueues as OrderQueuesModel;

class OrderQueue extends EndpointBase
{
    /**
     * Recupera novos pedidos e atualizações de status provenientes do Marketplace
     * Nessa fila serão disponibilizados os novos pedidos (NEW) e as alterações de status de pedido (APPROVED, CANCELED).
     * @see https://integra-api-homolog.azurewebsites.net/swagger/ui/index#!/OrderQueue/OrderQueue_GetQueue
     *
     * @param string $status Valores possíveis: NEW, APPROVED, CANCELED
     * @return OrderQueuesModel
     */
    public function getOrders($status): OrderQueuesModel
    {
        $response = $this->request('GET', 'OrderQueue', [
            'query' => [
                'Status' => $status
            ]
        ])->getResponse();
        return new OrderQueuesModel($response);
    }

    /**
     * Insere na fila pedidos novos e atualizações de status vindas do Marketplace
     * Esse método é utilizado para confirmar o consumo de um item da fila de pedidos. Ao confirmar um item na fila o mesmo não aparecerá para consumo novamente.
     * @see https://integra-api-homolog.azurewebsites.net/swagger/ui/index#!/OrderQueue/OrderQueue_Update
     * @param int $id
     */
    public function confirmOrder(int $ids)
    {
        $this->request('PUT', 'OrderQueue', [
            'json' => [
                'Id' => $id
            ]
        ]);
    }
}