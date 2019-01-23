<?php

namespace App\Data;

class UserDTO
{
    const MAX_FIELD_LENGTH = 255;

    const USERNAME_MIN_LENGTH = 4;
    const PASSWORD_MIN_LENGTH = 4;
    const FULL_NAME_MIN_LENGTH = 5;

    private $id;
    private $username;
    private $password;
    private $full_name;
    private $born_on;

    /**
     * @param $username
     * @param $password
     * @param $full_name
     * @param $born_on
     * @param null $id
     * @return UserDTO
     * @throws \Exception
     */
    public static function create($username,
                                  $password,
                                  $full_name,
                                  $born_on,
                                  $id = null)
    {

        return (new UserDTO())
            ->setUsername($username)
            ->setPassword($password)
            ->setFullName($full_name)
            ->setBornOn($born_on)
            ->setId($id);
    }

    /**
     * @return mixed
     */
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
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param $username
     * @return UserDTO
     * @throws \Exception
     */
    public function setUsername($username): UserDTO
    {
        PDOValidator::validate(
            self::USERNAME_MIN_LENGTH,
                self::MAX_FIELD_LENGTH,
                $username,
            "{$username} must be between {self::USERNAME_MIN_LENGTH} and {self::MAX_FIELD_LENGTH} characters!"
            );

        $this->username = $username;
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
        PDOValidator::validate(
            self::PASSWORD_MIN_LENGTH,
            self::MAX_FIELD_LENGTH,
            $password,
            "{$password} must be between {self::PASSWORD_MIN_LENGTH} and {self::MAX_FIELD_LENGTH} characters!"
        );

        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFullName()
    {
        return $this->full_name;
    }

    /**
     * @param $full_name
     * @return UserDTO
     * @throws \Exception
     */
    public function setFullName($full_name): UserDTO
    {
        PDOValidator::validate(
            self::FULL_NAME_MIN_LENGTH,
            self::MAX_FIELD_LENGTH,
            $full_name,
            "{$full_name} must be between {self::FULL_NAME_MIN_LENGTH} and {self::MAX_FIELD_LENGTH} characters!"
        );

        $this->full_name = $full_name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBornOn()
    {
        return $this->born_on;
    }

    /**
     * @param mixed $born_on
     * @return UserDTO
     */
    public function setBornOn($born_on): UserDTO
    {
        $this->born_on = $born_on;
        return $this;
    }


}