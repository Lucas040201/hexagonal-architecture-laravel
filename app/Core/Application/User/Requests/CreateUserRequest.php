<?php

namespace App\Core\Application\Requests;

use App\Core\Application\User\DTO\UserDTO;

class CreateUserRequest {

    // public UserDTO $userDTO;

    public function __construct(public UserDTO $userDTO) {

    }

    

}