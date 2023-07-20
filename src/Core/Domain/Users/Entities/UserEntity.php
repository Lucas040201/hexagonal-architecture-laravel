<?php

namespace Core\Domain\Users\Entities;

use Core\Domain\Base\Entity\BaseEntity;
use Core\Domain\DomainExceptions\EntityValidationException;
use Core\Domain\DomainValidator\DomainValidation;
use DateTime;

class UserEntity extends BaseEntity {

    private int|string $id;
    private string $name;
    private string $surname;
    private string $email;
    private string $password;
    private DateTime|string $created_at;
    private DateTime|string $updated_at;
    public function __construct()
    {
        $this->created_at  =  new DateTime();
    }

    /**
     * @return int|string
     */
    public function getId(): int|string
    {
        return $this->id;
    }

    /**
     * @param int|string $id
     */
    public function setId(int|string $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @throws EntityValidationException
     */
    public function setName(string $name): void
    {
        DomainValidation::strMinLength($name, 3, 'The name must have at least 3 characters');
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @param string $surname
     */
    public function setSurname(string $surname): void
    {
        DomainValidation::strMinLength($surname, 3, 'The surname must have at least 3 characters');
        $this->surname = $surname;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        DomainValidation::strFilterValidation($email, FILTER_VALIDATE_EMAIL, 'The Email field is invalid');
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return DateTime|string
     */
    public function getCreatedAt(): DateTime|string
    {
        return $this->created_at;
    }

    /**
     * @param DateTime|string $created_at
     */
    public function setCreatedAt(DateTime|string $created_at): void
    {
        $this->created_at = $created_at;
    }

    /**
     * @return DateTime|string
     */
    public function getUpdatedAt(): DateTime|string
    {
        return $this->updated_at;
    }

    /**
     * @param DateTime|string $updated_at
     */
    public function setUpdatedAt(DateTime|string $updated_at): void
    {
        $this->updated_at = $updated_at;
    }

}
