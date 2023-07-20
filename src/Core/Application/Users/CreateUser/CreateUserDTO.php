<?php

namespace Core\Application\Users\CreateUser;

class CreateUserDTO {
    public function __construct(
        private string $name = '',
        private string $surname = '',
        private string $email = '',
        private string $password = '',
    )
    {

    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setSurname(string $surname): void
    {
        $this->surname = $surname;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setPassword(string $password): void
    {
       $this->password = $password;
    }

}
