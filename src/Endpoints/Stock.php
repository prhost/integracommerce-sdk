<?php

namespace Integracommerce\Endpoints;

use Integracommerce\Classes\Collection;
use Integracommerce\Classes\EndpointBase;
use \Integracommerce\Model\Stocks as StockModel;

class Stock extends EndpointBase
{
    /**
     * Método utilizado para atualizar o estoque de um ou mais skus.
     * @see https://api.integracommerce.com.br/swagger/ui/index#!/Stock/Stock_Update
     *
     * @param StockModel $sku
     */
    public function updateStock(StockModel $stocks)
    {
        /** @var Collection $stock */
        foreach ($stocks->getStocks()->chunk(100) as $stock) {
            $this->request('PUT', 'Stock', [
                'json' => $stock->values()->toArray()
            ]);
        }
    }

    /**
     * Método utilizado para criar ou atualizar o estoque de um ou mais skus para processamento posterior.
     * @see https://api.integracommerce.com.br/swagger/ui/index#!/Stock/Stock_Batch
     *
     * @deprecated Metodo não existe mais
     * @param StockModel $sku
     */
    public function updateStockBatch(StockModel $stocks)
    {
        /** @var Collection $stock */
        foreach ($stocks->getStocks()->chunk(100) as $stock) {
            $this->request('PUT', 'Stock/Batch', [
                'json' => $stock->values()->toArray()
            ]);
        }
    }
}