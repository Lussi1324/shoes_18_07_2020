<?php

namespace App\Data;


class OfferDTO
{
    private const NAME_MIN_LENGTH = 4;
    private const NAME_MAX_LENGTH = 255;

    private const DESCRIPTION_MIN_LENGTH = 10;
    private const DESCRIPTION_MAX_LENGTH = 10000;

    private const IMAGE_MIN_LENGTH = 1;
    private const IMAGE_MAX_LENGTH = 150;

    private const PRICE_MIN_LENGTH = 0;
    private const PRICE_MAX_LENGTH = 1000000;
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $name;
    /**
     * @var float
     */
    private $price;
    /**
     * @var string
     */
    private $image;
    /**
     * @var string
     */
    private $description;

    /**
     * @var int
     */
    private $userId;
    /**
     * @var int
     */
    private $brandId;
    /**
     * @var BrandDTO[]
     */
    private $brands;
    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function getName():string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return OfferDTO
     * @throws \Exception
     */
    public function setName(string $name): OfferDTO
    {
        DTOValidator::validate(self::NAME_MIN_LENGTH, self::NAME_MAX_LENGTH,
            $name, "text", "Name");

        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription():string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return OfferDTO
     * @throws \Exception
     */
    public function setDescription(string $description): OfferDTO
    {
        DTOValidator::validate(self::DESCRIPTION_MIN_LENGTH, self::DESCRIPTION_MAX_LENGTH,
            $description, "text", "Description");

        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getImage():string
    {
        return $this->image;
    }

    /**
     * @param string $image
     * @return OfferDTO
     * @throws \Exception
     */
    public function setImage(string $image): OfferDTO
    {

        DTOValidator::validate(self::IMAGE_MIN_LENGTH, self::IMAGE_MAX_LENGTH,
            $image, "text", "Image");

        $this->image = $image;

        return $this;
    }

    /**
     * @return float
     */
    public function getPrice():float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return OfferDTO
     * @throws \Exception
     */
    public function setPrice(float $price): OfferDTO
    {
        DTOValidator::validate(self::PRICE_MIN_LENGTH,self::PRICE_MAX_LENGTH,
            $price, "text", "Price");
        $this->price = $price;

        return $this;
    }

    /**
     * @return int
     */
    public function getBrandId(): int
    {
        return $this->brandId;
    }

    /**
     * @param int $brandId
     */
    public function setBrandId(int $brandId): void
    {
        $this->brandId = $brandId;
    }

    /**
     * @return  BrandDTO[]
     */
    public function getBrands()
    {
        return $this->brands;

    }

     /**
      * @param  BrandDTO $brands
      */
    public function setBrands($brands)
    {
        $this->brands = $brands;
    }



}