<?php

namespace Core\Application\Users\CreateUser;

class CreateUserRequest {

    public function __construct(private readonly CreateUserDTO $dto)
    {
    }

    public function getDto(): CreateUserDTO
    {
        return $this->dto;
    }

}
