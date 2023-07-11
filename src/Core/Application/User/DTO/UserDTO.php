<?php

namespace Core\Application\User\DTO;

use Core\Domain\Entities\Interfaces\EntityInterface;
use DateTime;
use Core\Application\Interfaces\DTO\DTOInterface;
use Core\Domain\Entities\UserEntity;

class UserDTO implements DTOInterface {
    public function __construct(
        public string|int $id = '',
        public string $name = '',
        public string $surname = '',
        public string $email = '',
        public string $password = '',
        public DateTime|string $created_at = '',
        public DateTime|string $updated_at = ''
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
            $this->created_at,
            $this->updated_at
        );
    }
    public static function mapEntityToDTO(UserEntity|EntityInterface $entity): UserDTO
    {
        return new UserDTO(
            $entity->id,
            $entity->name,
            $entity->surname,
            $entity->email,
            $entity->created_at,
            $entity->updated_at
        );
    }

}
