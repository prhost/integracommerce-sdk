<?php

namespace IntegraCommerce\Endpoints;

use IntegraCommerce\Classes\EndpointBase;
use \IntegraCommerce\Model\Attributes as AttributesModel;

class Attribute extends EndpointBase
{
    /**
     * Método utilizado para pegar todos os atributos de produto ou de sku.Caso utilize isSku como true, o campo isProduct deve ser falso e vice-versa.
     *
     * @see https://api.integracommerce.com.br/swagger/ui/index#!/Attribute/Attribute_GetAll
     *
     * @return AttributesModel
     */
    public function getAttributes(bool $isSku = true, bool $isProduct = true, int $page = 1, int $perPage = 100): AttributesModel
    {
        $response = $this->request('GET', 'Attribute', [
            'query' => [
                'isSku' => $isSku ? 'true' : 'false',
                'isProduct' => $isProduct ? 'true' : 'false',
                'page' => $page,
                'perPage' => $perPage
            ]
        ])->getResponse();

        return new AttributesModel($response);
    }
}