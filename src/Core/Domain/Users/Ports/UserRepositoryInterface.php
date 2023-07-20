<?php

namespace Core\Domain\Users\Ports;

use Core\Domain\Users\Entities\UserEntity;

interface UserRepositoryInterface {

    public function get(int $id): array;
    public function create(UserEntity $user): void;
    public function update(int $user,  $data);
    public function delete(int $id);
    public function emailExists(string $email);
    public function usernameExists(string $username);

}
