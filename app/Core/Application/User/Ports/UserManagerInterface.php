<?php

namespace App\Core\Application\User\Ports;

use App\Core\Application\User\DTO\UserDTO;
use App\Core\Application\User\Response\UserResponse;

interface UserManagerInterface {
    public function createUser(UserDTO $request): UserResponse;
}