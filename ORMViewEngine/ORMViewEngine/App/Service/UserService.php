<?php

namespace App\Service;

use App\Repository\UserRepositoryInterface;
use App\Data\UserDTO;

class UserService implements UserServiceInterface
{
    /**
     * @var UserRepositoryInterface
     */
    private $userRepository;

    /**
     * UserService constructor.
     * @param UserRepositoryInterface $userRepository
     */
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function register(UserDTO $userDTO, string $confirmPassword): bool
    {
        if ($userDTO->getPassword() !== $confirmPassword) {
            return false;
        }
        if ($this->userRepository->findOneByUsername($userDTO->getUsername()) !== null) {
            return false;
        }

        $this->encryptPassword($userDTO);

        return $this->userRepository->insert($userDTO);
    }

    public function login(string $username, string $password): ?UserDTO
    {
        $currentUser = $this->userRepository->findOneByUsername($username);
        if ($currentUser === null) {
            return null;
        }
        $userPasswordHash = $currentUser->getPassword();

        if (password_verify($password, $userPasswordHash)) {
            return $currentUser;
        } else {
            return null;
        }
    }

    public function currentUser(): UserDTO
    {
        if (!isset($_SESSION['id'])) {
            return null;
        }
        return $this->userRepository->findOneById($_SESSION['id']);
    }

    public function edit(UserDTO $userDTO): bool
    {
        $currentUser = $this->userRepository->findOneByUsername($userDTO->getUsername());
        if (($currentUser !== null) && ($currentUser->getId() !== $_SESSION['id'])) {
            return false;
        }

        $this->encryptPassword($userDTO);
        return $this->userRepository->update($_SESSION['id'], $userDTO);
    }

    public function delete(UserDTO $userDTO): bool
    {
        $currentUser = $this->userRepository->findOneByUsername($userDTO->getUsername());
        if (($currentUser !== null) && ($currentUser->getId() !== $_SESSION['id'])) {
            return false;
        }

        return $this->userRepository->delete($_SESSION['id'], $userDTO);
    }

    /**
     * @param UserDTO $userDTO
     */
    private function encryptPassword(UserDTO $userDTO): void
    {
        $plainText = $userDTO->getPassword();
        $passwordHash = password_hash($plainText, PASSWORD_DEFAULT);
        $userDTO->setPassword($passwordHash);
    }


    /**
     * @return \Generator|UserDTO[]
     */
    public function all(): \Generator
    {
        return $this->userRepository->findAll();
    }


}