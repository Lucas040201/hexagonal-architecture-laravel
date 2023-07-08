<?php

namespace App\Repositories;

use App\Models\Users;
use App\Core\Domain\Entities\UserEntity;
use App\Core\Domain\Ports\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface {
    public function __construct(
        private Users $userModel
    )
    {
        
    }

    public function get(int $userId): UserEntity
    {
        $user = $this->userModel->findById($userId);
        return new UserEntity(...$user->attributesToArray());
    }

    public function create(UserEntity $user): int
    {
        $response = $this->userModel->create((array) $user);
        print_r($response);
        die();
        return 1;
    }

    public function update(UserEntity $user, $data)
    {
    }

    public function delete(UserEntity $user)
    {
    }
}