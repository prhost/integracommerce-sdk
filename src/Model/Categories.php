<?php


namespace IntegraCommerce\Model;

use IntegraCommerce\Classes\Collection;
use IntegraCommerce\Classes\ModelBase;

class Categories extends ModelBase
{
    protected static $attributeMap = [
        "Categories" => [
            "Id" => "string",
            "Name" => "string",
            "ParentId" => "string"
        ],
        "CategoriesMarketplace" => [
            "MarketPlaceName" => "string",
            "CategoryMarketplaceList" => [
                "CategoryId" => 0,
                "CategoryName" => "string",
                "SubCategoryId" => 0,
                "SubCategoryName" => "string",
                "FamilyId" => 0,
                "FamilyName" => "string",
                "SubFamilyId" => 0,
                "SubFamilyName" => "string"
            ]
        ]
    ];

    /**
     * @var Collection[Category]
     */
    protected $categories;

    public function __construct(\StdClass $data = null)
    {
        $this->categories = new Collection();

        if ($data) {
            $this->page = $data->Page;
            $this->perPage = $data->PerPage;
            $this->total = $data->Total;

            foreach ($data->Categories as $category) {
                $this->categories->push(new Category($category));
            }
        }
    }

    /**
     * @return Collection[Category]
     */
    public function getCategories(): Collection
    {
        return $this->categories;
    }

    /**
     * @param Collection[Category] $categories
     */
    public function setCategories(Collection $categories): void
    {
        $this->categories = $categories;
    }

    public function setCategory(Category $category)
    {
        if (null === $this->categories) {
            $this->categories = new Collection();
        }

        $this->categories->push($category);
    }
}