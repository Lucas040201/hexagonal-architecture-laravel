<?php

namespace App\Repositories\Users;

use App\Repositories\BaseRepositpory;
use Core\Domain\Users\Ports\UserRepositoryInterface;

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
