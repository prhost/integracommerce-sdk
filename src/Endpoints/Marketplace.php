<?php

namespace Integracommerce\Endpoints;

use Integracommerce\Classes\EndpointBase;
use \Integracommerce\Model\Marketplaces as MarketplacesModel;

class Marketplace extends EndpointBase
{
    /**
     * Método utilizado para recuperar todos os marketplaces que estão no integracommerce.
     *
     * @see https://api.integracommerce.com.br/swagger/ui/index#!/Marketplace/Marketplace_GetAll
     *
     * @return MarketplacesModel
     */
    public function getMarketplaces(): MarketplacesModel
    {
        $marketplaces = $this->request('GET', 'Marketplace')->getResponse();
        return new MarketplacesModel($marketplaces);
    }
}