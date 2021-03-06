<?php

namespace Integracommerce\Endpoints;

use Integracommerce\Classes\Collection;
use Integracommerce\Classes\EndpointBase;
use \Integracommerce\Model\Prices as PricesModel;

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
     * @deprecated Metodo não existe mais
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