<?php

namespace IntegraCommerce\Endpoints;

use IntegraCommerce\Classes\EndpointBase;
use \IntegraCommerce\Model\Attribute as AttributeModel;

class Attribute extends EndpointBase
{
    /**
     * Método utilizado para pegar todos os atributos de produto ou de sku.Caso utilize isSku como true, o campo isProduct deve ser falso e vice-versa.
     *
     * @see https://api.integracommerce.com.br/swagger/ui/index#!/Attribute/Attribute_GetAll
     *
     * @return AttributeModel
     */
    public function getAttribute(bool $isSku = true, bool $isProduct = true, int $page = 1, int $perPage = 100)
    {

        $response = $this->request('GET', 'Attribute', [
            'query' => [
                'isSku' => $isSku ? 'true' : 'false',
                'isProduct' => $isProduct ? 'true' : 'false',
                'page' => $page,
                'perPage' => $perPage
            ]
        ])->getResponse();

        return new AttributeModel($response);
    }
}