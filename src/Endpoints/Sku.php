<?php

namespace IntegraCommerce\Endpoints;

use IntegraCommerce\Classes\EndpointBase;
use IntegraCommerce\Client\Response;
use \IntegraCommerce\Model\Sku as SkuModel;

class Sku extends EndpointBase
{
    /**
     * Método utilizado para recuperar um sku específico.
     * @see https://api.integracommerce.com.br/swagger/ui/index#!/Sku/Sku_GetById
     *
     * @param string $id Id do SKU
     * @return SkuModel
     */
    public function getSku(string $id): SkuModel
    {
        $response = $this->request('GET', 'Sku/' . $id)->getResponse();
        return new SkuModel($response);
    }

    /**
     * Método utilizado para criar um sku.
     * @see https://api.integracommerce.com.br/swagger/ui/index#!/Sku/Sku_Create
     *
     * @param SkuModel $sku
     */
    public function createSku(SkuModel $sku)
    {
        $this->request('POST', 'Sku', [
            'json' => [
                "IdSku"         => $sku->getIdSku(),
                "IdSkuErp"      => $sku->getIdSkupErp(),
                "IdProduct"     => $sku->getIdProduct(),
                "Name"          => $sku->getName(),
                "Description"   => $sku->getDescription(),
                "Height"        => $sku->getHeight(),
                "Width"         => $sku->getWidth(),
                "Length"        => $sku->getLength(),
                "Weight"        => $sku->getWeight(),
                "CodeEan"       => $sku->getCodeEan(),
                "CodeNcm"       => $sku->getCodeNcm(),
                "CodeIsbn"      => $sku->getCodeIsbn(),
                "CodeNbm"       => $sku->getCodeNbm(),
                "Variation"     => $sku->getVariation(),
                "Status"        => $sku->isStatus(),
                "Price"         => [
                    'ListPrice' => $sku->getPrice()->getListPrice(),
                    'SalePrice' => $sku->getPrice()->getSalePrice(),
                ],
                "StockQuantity" => $sku->getStockQuantity(),
                "MainImageUrl"  => $sku->getMainImageUrl(),
                "UrlImages"     => $sku->getUrlImages(),
                "Attributes"    => $sku->getAttributes()->toArray(),
            ]
        ]);
    }

    /**
     * Método utilizado para atualizar um sku específico.
     * @see https://api.integracommerce.com.br/swagger/ui/index#!/Sku/Sku_Update
     *
     * @param SkuModel $product
     */
    public function updateSku(SkuModel $sku): Response
    {
        return $this->request('PUT', 'Sku', [
            'json' => [
                "IdSku"         => $sku->getIdSku(),
                "IdSkuErp"      => $sku->getIdSkupErp(),
                "IdProduct"     => $sku->getIdProduct(),
                "Name"          => $sku->getName(),
                "Description"   => $sku->getDescription(),
                "Height"        => $sku->getHeight(),
                "Width"         => $sku->getWidth(),
                "Length"        => $sku->getLength(),
                "Weight"        => $sku->getWeight(),
                "CodeEan"       => $sku->getCodeEan(),
                "CodeNcm"       => $sku->getCodeNcm(),
                "CodeIsbn"      => $sku->getCodeIsbn(),
                "CodeNbm"       => $sku->getCodeNbm(),
                "Variation"     => $sku->getVariation(),
                "Status"        => $sku->isStatus(),
                "Price"         => [
                    'ListPrice' => $sku->getPrice()->getListPrice(),
                    'SalePrice' => $sku->getPrice()->getSalePrice(),
                ],
                "StockQuantity" => $sku->getStockQuantity(),
                "MainImageUrl"  => $sku->getMainImageUrl(),
                "UrlImages"     => $sku->getUrlImages(),
                "Attributes"    => $sku->getAttributes()->toArray(),
            ]
        ]);
    }
}