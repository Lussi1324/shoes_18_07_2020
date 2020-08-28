<?php

namespace App\Repository;


use App\Data\UserDTO;
use Core\DataBinderInterface;
use Database\DatabaseInterface;

class UserRepository extends DatabaseAbstract implements UserRepositoryInterface
{

    public function __construct(DatabaseInterface $database,
                                DataBinderInterface $dataBinder)
    {
        parent::__construct($database, $dataBinder);
    }

    public function insert(UserDTO $userDTO): bool
    {
        $this->db->query(
            "INSERT INTO users(email,full_name, password)
                  VALUES(?,?,?)
             "
        )->execute([
            $userDTO->getEmail(),
            $userDTO->getFullName(),
            $userDTO->getPassword(),
        ]);

        return true;
    }

    public function findOneByFullname(string $fullname): ?UserDTO
    {
        return $this->db->query(
            "SELECT id, 
                    email, 
                    full_name,
                    password
                  FROM users
                  WHERE full_name = ?
             "
        )->execute([$fullname])
            ->fetch(UserDTO::class)
            ->current();
    }

    public function findOneByEmail(string $email): ?UserDTO
    {
        return $this->db->query(
            "SELECT id, 
                    email, 
                    full_name,
                    password
                  FROM users
                  WHERE email = ?
             "
        )->execute([$email])
            ->fetch(UserDTO::class)
            ->current();
    }

    public function findOneById(int $id): ?UserDTO
    {
        return $this->db->query(
            "SELECT id,
                   email, 
                    full_name as fullname,
                    password
                  FROM users
                  WHERE id = ?
             "
        )->execute([$id])
            ->fetch(UserDTO::class)
            ->current();
    }

    /**
     * @return \Generator|UserDTO[]
     */
    public function findAll(): \Generator
    {
        return $this->db->query(
            "
                  SELECT id, 
                    email, 
                    full_name as fullname,
                    password
                  FROM users
            "
        )->execute()
            ->fetch(UserDTO::class);
    }
}