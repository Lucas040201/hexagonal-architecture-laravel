<?php

namespace Core\Domain\Users\Entities;

use Core\Domain\BaseEntity;
use Core\Domain\DomainExceptions\EntityValidationException;
use Core\Domain\DomainValidator\DomainValidation;
use DateTime;

class UserEntity extends BaseEntity {
    /**
     * @throws EntityValidationException
     * @throws \Exception
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
        $this->created_at  = $this->created_at ? new DateTime($this->created_at) : new DateTime();
        $this->validateEntity();
    }

    /**
     * @throws EntityValidationException
     */
    protected function validateEntity(): void
    {
        DomainValidation::strMinLength($this->name, 3, 'The name must have at least 3 characters');
        DomainValidation::strMinLength($this->surname, 3, 'The surname must have at least 3 characters');
        DomainValidation::strFilterValidation($this->email, FILTER_VALIDATE_EMAIL, 'The Email field is invalid');
    }

}
