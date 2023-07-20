<?php

namespace App\Repositories\Users;

use App\Models\Users;
use App\Repositories\BaseRepositpory;
use Core\Domain\Users\Entities\UserEntity;
use Core\Domain\Users\Ports\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface {

    public function __construct(private readonly Users $userModel)
    {

    }

    public function create(UserEntity $user): void
    {
        $user = [
            'name' => $user->getName(),
            'surname' => $user->getSurname(),
            'email' => $user->getEmail(),
            'password' => $user->getPassword(),
            'createdAt' => $user->getCreatedAt()
        ];

        $this->userModel->create($user);
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

    public function emailExists(string $email): bool
    {
        return !!$this->userModel::where('email', $email)->exists();
    }

    public function usernameExists(string $username): bool
    {
        return !!$this->userModel::where('username', $username)->exists();
    }
}
