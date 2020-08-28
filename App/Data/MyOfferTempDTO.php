<?php

namespace App\Data;


class MyOfferTempDTO
{
    private $offers = [];

    private $user = null;

    /**
     * MyOfferTempDTO constructor.
     * @param array $offers
     * @param null $user
     */
    public function __construct(array $offers, UserDTO $user)
    {
        $this->offers = $offers;
        $this->user = $user;
    }


    /**
     * @return array of MyOfferDTO
     */
    public function getOffers(): array
    {
        return $this->offers;
    }

    /**
     * @param array of MyOfferDTO $offers
     */
    public function setOffers(array $offers): void
    {
        $this->offers = $offers;
    }

    /**
     * @return UserDTO
     */
    public function getUser() : UserDTO
    {
        return $this->user;
    }

    /**
     * @param UserDTO $user
     */
    public function setUser(UserDTO $user): void
    {
        $this->user = $user;
    }

    public function getTotalPrice(): float {
        $total = 0;
        foreach ($this->offers as $offer) {
            $total += $offer->getPrice();
        }
        return $total;
    }

    public function getCount(): int {
        return count($this->offers);
    }

}