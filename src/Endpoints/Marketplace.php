<?php

namespace IntegraCommerce\Endpoints;

use IntegraCommerce\Classes\EndpointBase;
use \IntegraCommerce\Model\Marketplace as MarketplaceModel;

class Marketplace extends EndpointBase
{
    /**
     * Método utilizado para recuperar todos os marketplaces que estão no integracommerce.
     *
     * @see https://api.integracommerce.com.br/swagger/ui/index#!/Marketplace/Marketplace_GetAll
     *
     * @return MarketplaceModel
     */
    public function getMarketplaces(): MarketplaceModel
    {
        $marketplaces = $this->request('GET', 'Marketplace')->getResponse();
        return new MarketplaceModel($marketplaces);
    }
}