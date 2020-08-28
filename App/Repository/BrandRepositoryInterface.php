<?php

namespace App\Repository;


use App\Data\BrandDTO;

interface BrandRepositoryInterface
{
    /**
     * @return \Generator|BrandDTO[]
     */
    public function findAll() : \Generator;
    /**
     * @return \Generator|BrandDTO[]
     */
    public function findOneById(int $id):BrandDTO;

}