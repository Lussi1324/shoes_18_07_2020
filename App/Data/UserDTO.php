<?php

namespace App\Data;


class UserDTO
{
    private const FULLNAME_MIN_LENGTH = 4;
    private const FULLNAME_MAX_LENGTH = 255;

    private const PASSWORD_MIN_LENGTH = 4;
    private const PASSWORD_MAX_LENGTH = 255;

    private const EMAIL_MIN_LENGTH = 4;
    private const EMAIL_MAX_LENGTH = 255;

    private $id;
    private $fullname;
    private $password;
    private $email;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): UserDTO
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->fullname;
    }

    /**
     * @param $fullname
     * @return UserDTO
     * @throws \Exception
     */
    public function setFullName($fullname): UserDTO
    {
        DTOValidator::validate(self::FULLNAME_MIN_LENGTH, self::FULLNAME_MAX_LENGTH,
            $fullname, "text", "Full Name");
        $this->fullname= $fullname;
        return $this;
    }




    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param $password
     * @return UserDTO
     * @throws \Exception
     */
    public function setPassword($password): UserDTO
    {
        DTOValidator::validate(self::PASSWORD_MIN_LENGTH, self::PASSWORD_MAX_LENGTH,
            $password, "password", "Password");
        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param $email
     * @return UserDTO
     * @throws \Exception
     */
    public function setEmail($email): UserDTO
    {
        DTOValidator::validate(self::EMAIL_MIN_LENGTH, self::EMAIL_MAX_LENGTH,
            $email, "string", "Email");
        $this->email = $email;
        return $this;
    }








}