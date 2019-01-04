<?php

namespace IntegraCommerce\Endpoints;

use IntegraCommerce\Classes\Collection;
use IntegraCommerce\Classes\EndpointBase;
use \IntegraCommerce\Model\Prices as PricesModel;

class Price extends EndpointBase
{
    /**
     * Método utilizado para atualizar o preço de um Sku.
     * @see https://api.integracommerce.com.br/swagger/ui/index#!/Price/Price_Update
     *
     * @param PricesModel $prices
     * @return array
     */
    public function updatePrice(PricesModel $prices): array
    {
        $responses = [];

        /** @var Collection $price */
        foreach ($prices->getPrices()->chunk(100) as $price) {
            $responses[] = $this->request('PUT', 'Price', [
                'json' => $price->values()->toArray()
            ]);
        }

        return $responses;
    }

    /**
     * Método utilizado para atualizar uma lista de preços Sku para processamento posterior.
     * @see https://api.integracommerce.com.br/swagger/ui/index#!/Price/Price_Batch
     *
     * @param PricesModel $prices
     * @return array
     */
    public function updatePriceBatch(PricesModel $prices): array
    {
        $responses = [];

        /** @var Collection $price */
        foreach ($prices->getPrices()->chunk(100) as $price) {
            $responses[] = $this->request('PUT', 'Price/Batch', [
                'json' => $price->values()->toArray()
            ]);
        }

        return $responses;
    }
}