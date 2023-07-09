<?php

namespace App\Core\Domain\Entities;

use App\Core\Domain\Entities\Interfaces\EntityInterface;
use DateTime;

class UserEntity implements EntityInterface {
    public function __construct(
        public int|string $id = '',
        public string $name = '',
        public string $surname = '',
//        public string $username = '',
        public string $email = '',
        public string $password = '',
        public DateTime|string $createdAt = '',
        public DateTime|string $updatedAt = '',
    )
    {

    }

    public function populateEntity(array $data): UserEntity
    {
        return new UserEntity(...$data);
    }
}
