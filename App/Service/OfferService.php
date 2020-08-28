<?php

namespace App\Service;

use App\Data\FullOfferDTO;
use App\Data\OfferDTO;
use App\Data\MyOfferDTO;
use App\Data\MyOfferTempDTO;
use App\Repository\OfferRepositoryInterface;
use App\Service\UserServiceInterface;

class OfferService implements OfferServiceInterface
{
    /**
     * @var OfferRepositoryInterface
     */
    private $offerRepository;
    /**
     * @var UserServiceInterface
     */
    private $userService;
    /**
     * OfferService constructor.
     * @param OfferRepositoryInterface $offerRepository
     * @param  UserServiceInterface $userService
     */
    public function __construct(OfferRepositoryInterface $offerRepository,UserServiceInterface $userService)
    {
        $this->offerRepository = $offerRepository;
        $this->userService = $userService;
    }

    /**
     * @param OfferDTO $offer
     * @return mixed
     * @throws \Exception
     */
    public function create(OfferDTO $offer)
    {
        return $this->offerRepository->add($offer);
    }

    /**
     * @param int $user
     * @return MyOfferDTO[]|\Generator
     */
    public function getByUserId(int $userId): \Generator
    {
        return $this->offerRepository->findByUserId($userId);
    }

    /**
     * @return FullOfferDTO[]|\Generator
     */
    public function getAll(): \Generator
    {

       return $this->offerRepository->findAll();
    }

    /**
     * @param OfferDTO $offer
     * @param int $userId
     * @throws \Exception
     */
    public function edit(OfferDTO $offer, int $userId)
    {
       $offers = $this->offerRepository->findByUserId($userId);

       $hasOffer = false;
       foreach ($offers as $userOffer) {
           if ($userOffer->getId() == $offer->getId()) {
               $hasOffer = true;
               break;
           }
       }

       if (!$hasOffer) {
           throw new \Exception('Not an owner');
       }

       $this->offerRepository->edit($offer);
    }

    public function getOne(int $id): FullOfferDTO
    {
        return $this->offerRepository->findOne($id);
    }

    /**
     * @param int $offerId
     * @param int $userId
     * @throws \Exception
     */
    public function delete(int $offerId, int $userId)
    {

        $offer = $this->getOne($offerId);

        if ($offer->getUserId() != $userId) {
            throw new \Exception('Not an owner');
        }

        $this->offerRepository->delete($offerId);
    }
    public function getAllByAuthor()
    {
        $currentUser = $this->userService->currentUser();

        $offersGenerotor = $this->offerRepository->findByUserId($currentUser->getId());
        $offers = array();
        foreach ($offersGenerotor as $offer) {

            $offers[] = $offer;
        }
        return new MyOfferTempDTO($offers, $currentUser);
    }
}