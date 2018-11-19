<?php

namespace IntegraCommerce\Endpoints;

use IntegraCommerce\Classes\EndpointBase;
use \IntegraCommerce\Model\MarketplaceStructure as MarketplaceStructureModel;

class MarketplaceStructure extends EndpointBase
{
    /**
     * Método utilizado para recuperar todas categorias dos marketplaces que estão no integracommerce.
     *
     * @see https://api.integracommerce.com.br/swagger/ui/index#!/MarketplaceStructure/MarketplaceStructure_GetAll
     *
     * @return MarketplaceStructureModel
     */
    public function getMarketplaceStructure(string $marketplaceName, string $parentId = '0', int $page = 1, int $perPage = 100)
    {

        $response = $this->request('GET', 'MarketplaceStructure', [
            'query' => [
                'marketplaceName' => $marketplaceName,
                'parentId' => $parentId,
                'page' => $page,
                'perPage' => $perPage
            ]
        ])->getResponse();

        return new MarketplaceStructureModel($response);
    }
}