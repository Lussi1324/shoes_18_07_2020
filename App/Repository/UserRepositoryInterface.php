<?php

namespace App\Repository;


use App\Data\UserDTO;

interface UserRepositoryInterface
{
    public function insert(UserDTO $userDTO) : bool;
    public function findOneByFullname(string $fullname) : ?UserDTO;
    public function findOneByEmail(string $email): ?UserDTO;
    public function findOneById(int $id) : ?UserDTO;

    /**
     * @return \Generator|UserDTO[]
     */
    public function findAll() : \Generator;
}