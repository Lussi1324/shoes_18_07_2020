<?php

namespace App\Data;


class BrandDTO
{
    private $id;
    private $brand;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return BrandDTO
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param $brand
     * @return BrandDTO
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;
    }
}