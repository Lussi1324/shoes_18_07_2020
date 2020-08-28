<?php

namespace App\Service;


use App\Data\BrandDTO;
use App\Repository\BrandRepositoryInterface;

class BrandService implements BrandServiceInterface
{
    /**
     * @var BrandRepositoryInterface
     */
    private $brandRepository;

    public function __construct(BrandRepositoryInterface $brandRepository)
    {
        $this->brandRepository = $brandRepository;
    }


    /**
     * @return \Generator|BrandDTO
     */
    public function getAll(): \Generator
    {
        return $this->brandRepository->findAll();
    }

    public function getOneById(int $id): BrandDTO
    {
        return $this->brandRepository->findOneById($id);
    }
}