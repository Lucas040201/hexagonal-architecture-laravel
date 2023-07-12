<?php

namespace Core\Domain\Users\Ports;

use Core\Domain\Interfaces\Entity\EntityInterface;
use Core\Domain\Users\Entities\UserEntity;

interface UserRepositoryInterface {

    public function get(int $id): EntityInterface|UserEntity;
    public function create(UserEntity|EntityInterface $user): EntityInterface|UserEntity;
    public function update(int $user,  $data);
    public function delete(int $id);
    public function emailExists(string $email);
    public function usernameExists(string $username);

}
