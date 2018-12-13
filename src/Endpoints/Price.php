<?php

namespace IntegraCommerce\Endpoints;

use IntegraCommerce\Classes\EndpointBase;
use \IntegraCommerce\Model\Prices as PricesModel;

class Price extends EndpointBase
{
    /**
     * Método utilizado para atualizar o preço de um Sku.
     * @see https://api.integracommerce.com.br/swagger/ui/index#!/Price/Price_Update
     *
     * @param string $id Id do SKU
     */
    public function updatePrices(PricesModel $prices): PriceModel
    {
        $this->request('PUT', 'Price', [
            'json' => $prices->getPrices()->toArray()
        ]);
    }
}