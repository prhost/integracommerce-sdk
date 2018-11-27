<?php

namespace IntegraCommerce\Endpoints;

use IntegraCommerce\Classes\EndpointBase;
use IntegraCommerce\Client\Response;
use \IntegraCommerce\Model\Product as ProductModel;

class Product extends EndpointBase
{
    /**
     * Método utilizado para recuperar uma categoria pelo ID.
     * @see https://api.integracommerce.com.br/swagger/ui/index#!/Category/Category_GetById
     *
     * @param string $id Id da categoria
     * @return CategoryModel
     */
    public function getCategoryById(string $id): CategoryModel
    {
        $response = $this->request('GET', 'Category/' . $id)->getResponse();
        return new CategoryModel($response);
    }

    /**
     * Método utilizado para criar um produto.
     * @see https://api.integracommerce.com.br/swagger/ui/index#!/Product/Product_Create
     *
     * @param ProductModel $product
     * @return Response
     */
    public function createProduct(ProductModel $product): Response
    {
        $response = $this->request('POST', 'Product', [
            'json' => [
                "IdProduct" => "string",
                "Name" => "string",
                "Code" => "string",
                "Brand" => "string",
                "NbmOrigin" => 1,
                "NbmNumber" => 1,
                "WarrantyTime" => 1,
                "Active" => true,
                "Categories" => [
                    "Id" => "string",
                    "Name" => "string",
                    "ParentId" => "string"
                ],
                "MarketplaceStructures" => [
                    [
                        "Id" => "string",
                        "Name" => "string",
                        "ParentId" => "string"
                    ]
                ],
                "Attributes" => [
                    [
                        "Name" => "string",
                        "Value" => "string"
                    ]
                ]
            ]
        ])->getResponse();

        return $response;
    }
}