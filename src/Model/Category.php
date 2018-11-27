<?php


namespace IntegraCommerce\Model;

use IntegraCommerce\Classes\ModelBase;

class Category extends ModelBase
{
    protected static $attributeMap = [
        "Id" => "string",
        "Name" => "string",
        "ParentId" => "string"
    ];

    /**
     * @var string
     */
    public $Id;

    /**
     * @var string
     */
    public $Name;

    /**
     * @var
     */
    public $ParentId = '';

    public function __construct(\StdClass $data = null)
    {
        if ($data) {
            $this->setId($data->Id);
            $this->setName($data->Name);
            $this->setParentId($data->ParentId ? $data->ParentId : "");
        }
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->Id;
    }

    /**
     * @param string $id
     */
    public function setId(string $id): void
    {
        $this->Id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->Name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->Name = $name;
    }

    /**
     * @return string
     */
    public function getParentId(): string
    {
        return $this->ParentId;
    }

    /**
     * @param string $parentId
     */
    public function setParentId($parentId): void
    {
        $this->ParentId = (string)$parentId;
    }
}