<?php

namespace IntegraCommerce\Endpoints;

use IntegraCommerce\Classes\EndpointBase;
use IntegraCommerce\Model\Categories;
use \IntegraCommerce\Model\Category as CategoryModel;
use \IntegraCommerce\Model\Categories as CategoriesModel;

class Category extends EndpointBase
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
     * Método utilizado para recuperar todas categorias que estão no integracommerce.
     * @see https://api.integracommerce.com.br/swagger/ui/index#!/Category/Category_GetAll
     *
     * @param int $level Nível da categoria. O primeiro nível da árvore de categorias é 0(zero)
     * @param int $page Página atual
     * @param int $perPage Itens por página
     * @return CategoriesModel
     */
    public function getCategories(int $level = 0, int $page = 1, int $perPage = 100)
    {
        $response = $this->request('GET', 'Category', [
            'query' => [
                'level' => $level,
                'page' => $page,
                'perPage' => $perPage
            ]
        ])->getResponse();

        return new CategoriesModel($response);
    }

    public function createCategories(Categories $categories): bool
    {
        $this->request('POST', 'Category', [
            'json' => $categories->getCategories()->toArray()
        ]);

        return true;
    }
}