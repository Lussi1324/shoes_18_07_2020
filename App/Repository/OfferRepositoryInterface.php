<?php

namespace App\Repository;

use App\Data\FullOfferDTO;
use App\Data\OfferDTO;
use App\Data\MyOfferDTO;

interface OfferRepositoryInterface
{
    public function add(OfferDTO $offer);

    /**
     * @param int $userId
     * @return MyOfferDTO[]|\Generator
     */
    public function findByUserId(int $userId): \Generator;

    /**
     * @return FullOfferDTO[]|\Generator
     */
    public function findAll(): \Generator;

    public function findOne(int $id): FullOfferDTO;

    public function edit(OfferDTO $offer);

    public function delete(int $id);
}