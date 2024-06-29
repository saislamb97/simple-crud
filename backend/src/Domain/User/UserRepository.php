<?php

declare(strict_types=1);

namespace App\Domain\User;

interface UserRepository
{
    /**
     * @return User[]
     */
    public function findAll(): array;

    /**
     * @param int $id
     * @return User
     * @throws UserNotFoundException
     */
    public function findUserOfId(int $id): User;

    /**
     * @param array $data
     */
    public function createUser(array $data): void;

    /**
     * @param int $id
     * @param array $data
     */
    public function updateUser(int $id, array $data): void;

    /**
     * @param int $id
     */
    public function deleteUser(int $id): void;
}
