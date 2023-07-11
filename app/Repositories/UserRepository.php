<?php

namespace App\Repositories;

use App\Models\Users;
use Core\Domain\Entities\UserEntity;
use Core\Domain\Ports\UserRepositoryInterface;

class UserRepository extends BaseRepositpory implements UserRepositoryInterface {

    public function emailExists(string $email)
    {
        return !!$this->model::where('email', $email)->exists();
    }

    public function usernameExists(string $username)
    {
        return !!$this->model::where('username', $username)->exists();
    }
}
