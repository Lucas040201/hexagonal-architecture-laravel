<?php

namespace App\Repositories;

use App\Models\Users;
use App\Core\Domain\Entities\UserEntity;
use App\Core\Domain\Ports\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface {
    public function __construct(
        private Users $userModel,
    )
    {}

    public function get(int $userId): UserEntity
    {
        $user = $this->userModel->findById($userId);
        return new UserEntity(...$user->attributesToArray());
    }

    public function create(UserEntity $user): UserEntity
    {
        $response = $this->userModel->create((array) $user);
        $user = $response->attributesToArray();
        return new UserEntity(...$user);
    }

    public function update(UserEntity $user, $data)
    {
    }

    public function delete(UserEntity $user)
    {

    }

    public function emailExists(string $email)
    {
        return !!$this->userModel::where('email', $email)->exists();
    }

    public function usernameExists(string $username)
    {
        return !!$this->userModel::where('username', $username)->exists();
    }
}
