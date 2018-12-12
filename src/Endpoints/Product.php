<?php

namespace IntegraCommerce\Endpoints;

use IntegraCommerce\Classes\EndpointBase;
use IntegraCommerce\Client\Response;
use \IntegraCommerce\Model\Product as ProductModel;

class Product extends EndpointBase
{
    /**
     * Método utilizado para recuperar um produto específico.
     * @see https://api.integracommerce.com.br/swagger/ui/index#!/Product/Product_GetById
     *
     * @param string $id Id do produto
     * @return ProductModel
     */
    public function getProduct(string $id): ProductModel
    {
        $response = $this->request('GET', 'Product/' . $id)->getResponse();
        return new ProductModel($response);
    }

    /**
     * Método utilizado para criar um produto.
     * @see https://api.integracommerce.com.br/swagger/ui/index#!/Product/Product_Create
     *
     * @param ProductModel $product
     */
    public function createProduct(ProductModel $product): Response
    {
        return $this->request('POST', 'Product', [
            'json' => [
                "IdProduct"             => $product->getIdProduct(),
                "Name"                  => $product->getName(),
                "Code"                  => $product->getCode(),
                "Brand"                 => $product->getBrand(),
                "NbmOrigin"             => (int)$product->getNbmOrigin(),
                "NbmNumber"             => $product->getNbmNumber(),
                "WarrantyTime"          => $product->getWarrantyTime(),
                "Active"                => $product->isActive(),
                "Categories"            => $product->getCategories()->toArray(),
                "MarketplaceStructures" => $product->getMarketplaceStructures()->toArray(),
                "Attributes"            => $product->getAttributes()->toArray(),
            ]
        ]);
    }

    /**
     * Método utilizado para atualizar um produto específico.
     * @see https://api.integracommerce.com.br/swagger/ui/index#!/Product/Product_Update
     *
     * @param ProductModel $product
     */
    public function updateProduct(ProductModel $product): Response
    {
        return $this->request('PUT', 'Product', [
            'json' => [
                "IdProduct"             => $product->getIdProduct(),
                "Name"                  => $product->getName(),
                "Code"                  => $product->getCode(),
                "Brand"                 => $product->getBrand(),
                "NbmOrigin"             => (int)$product->getNbmOrigin(),
                "NbmNumber"             => $product->getNbmNumber(),
                "WarrantyTime"          => $product->getWarrantyTime(),
                "Active"                => $product->isActive(),
                "Categories"            => $product->getCategories()->toArray(),
                "MarketplaceStructures" => $product->getMarketplaceStructures()->toArray(),
                "Attributes"            => $product->getAttributes()->toArray(),
            ]
        ]);
    }
}