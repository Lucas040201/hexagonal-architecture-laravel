<?php

namespace App\Core\Application\User\DTO;

use App\Core\Application\Interfaces\DTO\DTOInterface;
use App\Core\Domain\Entities\UserEntity;
use DateTime;

class UserDTO implements DTOInterface {
    public function __construct(
        public string|int $id = '',
        public string $name = '',
        public string $surname = '',
        public string $email = '',
        public string $password = '',
        public DateTime|string $createdAt = '',
        public DateTime|string $updatedAt = ''
    )
    {
        
    }



    public function mapToEntity() : UserEntity
    {
        return new UserEntity(
            $this->id,
            $this->name,
            $this->surname,
            $this->email,
            $this->password,
            $this->createdAt,
            $this->updatedAt
        );
    }

}