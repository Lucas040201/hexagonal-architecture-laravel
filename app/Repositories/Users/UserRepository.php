<?php

namespace App\Repositories\Users;

use App\Repositories\BaseRepositpory;
use Core\Domain\Users\Entities\UserEntity;
use Core\Domain\Users\Ports\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface {

    public function create(UserEntity $item): void
    {
        $user = [
            'name' => $item->getName(),
            'surname' => $item->getSurname(),
            'email' => $item->getEmail(),
            'password' => $item->getPassword(),
        ];

        $this->model->create($user);
    }

    public function get(int $id): array
    {
        // TODO: Implement get() method.
    }

    public function update(int $user, $data)
    {
        // TODO: Implement update() method.
    }

    public function delete(int $id)
    {
        // TODO: Implement delete() method.
    }

    public function emailExists(string $email)
    {
        return !!$this->model::where('email', $email)->exists();
    }

    public function usernameExists(string $username)
    {
        return !!$this->model::where('username', $username)->exists();
    }
}
