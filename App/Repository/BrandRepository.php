<?php

namespace App\Repository;
use App\Data\BrandDTO;
use Database\DatabaseInterface;

class BrandRepository implements BrandRepositoryInterface
{
    /**
     * @var DatabaseInterface
     */
    private $db;

    /**
     * BrandRepository constructor.
     * @param DatabaseInterface $db
     */
    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }


    /**
     * @return \Generator|BrandDTO
     */
    public function findAll(): \Generator
    {
        return $this->db->query("SELECT id, brand FROM brands ORDER BY id")
            ->execute()
            ->fetch(BrandDTO::class);
    }

    public function findOneById(int $id): BrandDTO
    {
        return $this->db->query("SELECT id,brand FROM brands WHERE id=?")
            ->execute([$id])
            ->fetch(BrandDTO::class)
            ->current();
    }

}