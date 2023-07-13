<?php

namespace Core\Application\User\DTO;

use Core\Application\Interfaces\DTO\DTOInterface;
use Core\Domain\DomainInterfaces\Entity\EntityInterface;
use Core\Domain\Users\Entities\UserEntity;
use DateTime;

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

    /**
     * @throws \Core\Domain\Users\Exceptions\User\InvalidEmailException
     * @throws \Core\Domain\Users\Exceptions\ShortNameOrSurnameException
     * @throws \Core\Domain\Users\Exceptions\User\ShortPasswordException
     */
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

    public static function updateDto(array $data): DTOInterface
    {
        return new static(...$data);
    }

}
