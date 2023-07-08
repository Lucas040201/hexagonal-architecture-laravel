<?php

namespace App\Core\Domain\Entities;

use DateTime;

class UserEntity {
    public function __construct(
        public int|string $id = '',
        public string $name = '',
        public string $surname = '',
        public string $email = '',
        public string $password = '',
        public DateTime|string $createdAt = '',
        public DateTime|string $updatedAt = '',
    )
    {
        
    }

}