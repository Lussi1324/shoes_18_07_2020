<?php

namespace App\Repository;

use App\Data\FullOfferDTO;
use App\Data\OfferDTO;
use App\Data\MyOfferDTO;
use Database\DatabaseInterface;
use App\Repository\DatabaseAbstract;
use Core\DataBinderInterface;
use App\Repository\OfferRepositoryInterface;
use Generator;

class OfferRepository extends DatabaseAbstract implements OfferRepositoryInterface
{
    public function add(OfferDTO $offer)
    {
        $this->db->query("INSERT INTO 
        offers (name, price,image_url, description, brand_id, user_id) 
        VALUES (?, ?, ?, ?, ?,?)")
            ->execute([$offer->getName(),
                        $offer->getPrice(),
                       $offer->getImage(),
                       $offer->getDescription(),
                       $offer->getBrands()->getId(),
                       $offer->getUserId()
            ]);
    }


    /**
     * @param int $userId
     * @return MyOfferDTO[] | Generator
     */
    public function findByUserId(int $userId): Generator
    {
       return $this->db->query("
	            SELECT 
	                   o.id,
	                   o.name,
	                   o.price,
	                   o.image_url as image
                FROM offers o                     
            WHERE o.user_id = ?
            ORDER BY 
              o.price DESC"
       )->execute([$userId])->fetch(MyOfferDTO::class);
    }

    /**
     * @return FullOfferDTO[]|Generator
     */
    public function findAll(): Generator
    {
        return $this->db->query(
            "SELECT
                    o.id,
                    o.name,
                    o.price,
                    o.image_url as image,
                    o.description,
                    o.user_id as userdId
                   FROM
                    offers o
                    JOIN users u on o.user_id = u.id
                    ORDER BY o.price DESC 
            "
        )->execute()->fetch(FullOfferDTO::class);
    }

    public function edit(OfferDTO $offer)
    {
        $this->db->query(
            "UPDATE offers SET
            name = ?,
             price = ?,
            image_url =?,
            description = ?,
            brand_id = ?,
            user_id = ?
            WHERE id = ?"
        )->execute([
            $offer->getName(),
            $offer->getPrice(),
            $offer ->getImage(),
            $offer->getDescription(),
            $offer->getBrands()->getId(),
           $offer->getUserId(),
            $offer->getId()
        ]);
    }

    public function findOne(int $id): FullOfferDTO
    {
        return $this->db->query(
            "SELECT
                    o.id,
                    o.name,
                    o.price,
                    o.image_url as image,
                    o.description,
                    o.user_id as userId,
                    o.brand_id as brandId
                   FROM
                    offers o
                    JOIN brands b on o.brand_id = b.id
                    JOIN users u on o.user_id = u.id
                   
                    WHERE o.id = ?"
        )->execute([$id])->fetchOne(FullOfferDTO::class);
    }

    public function delete(int $id)
    {
        $this->db->query("DELETE FROM offers WHERE id = ?")->execute([$id]);
    }
    }