<?php

namespace Core\Domain\Users\Entities;

use Core\Domain\BaseEntity;
use Core\Domain\DomainExceptions\EntityValidationException;
use DateTime;

class UserEntity extends BaseEntity {
    /**
     * @throws EntityValidationException
     */
    public function __construct(
        public int|string $id = '',
        public string $name = '',
        public string $surname = '',
        public string $email = '',
        public string $password = '',
        public DateTime|string $created_at = '',
        public DateTime|string $updated_at = '',
    )
    {
        $this->validateEntity();
    }

    /**
     * @throws EntityValidationException
     */
    protected function validateEntity(): void
    {
        if(empty($this->created_at) && empty($this->updated_at)) return;

        if(strlen($this->name) < 3 || strlen($this->surname) < 3) {
            throw new EntityValidationException('The first and last name fields must have at least 2 characters', 400);
        }

        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            throw new EntityValidationException('The email field must be a valid email address.', 400);
        }
    }

}
