<?php

namespace App\Service;

use App\Data\BrandDTO;

interface BrandServiceInterface
{

    /**
     * @return \Generator|BrandDTO[]
     */
    public function getAll() : \Generator;

    public function getOneById(int $id): BrandDTO;
}