<?php


namespace IntegraCommerce\Model;

use IntegraCommerce\Classes\Collection;
use IntegraCommerce\Classes\ModelBase;
use IntegraCommerce\Traits\Paginable;

class Categories extends ModelBase
{
    use Paginable;

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

    public function __construct(\StdClass $categories = null)
    {
        $this->categories = new Collection();

        if ($categories) {
            $this->page = $categories->Page;
            $this->perPage = $categories->PerPage;
            $this->total = $categories->Total;

            foreach ($categories->Categories as $category) {
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