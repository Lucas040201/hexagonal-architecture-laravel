<?php

namespace Core\Domain\Entities;

use Core\Domain\DomainExceptions\User\InvalidEmailException;
use Core\Domain\DomainExceptions\User\ShortNameOrSurnameException;
use Core\Domain\DomainExceptions\User\ShortPasswordException;
use DateTime;

class UserEntity extends BaseEntity {
    /**
     * @throws ShortNameOrSurnameException
     * @throws ShortPasswordException
     * @throws InvalidEmailException
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
     * @throws ShortNameOrSurnameException
     * @throws ShortPasswordException
     * @throws InvalidEmailException
     */
    protected function validateEntity(): void
    {
        if(empty($this->created_at) && empty($this->updated_at)) return;

        if(strlen($this->name) < 3 || strlen($this->surname) < 3) {
            throw new ShortNameOrSurnameException();
        }

        if(strlen($this->password) < 6 || strlen($this->password) > 16) {
            throw new ShortPasswordException();
        }

        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidEmailException();
        }
    }

}
