<?php

namespace App\Core\Application\User\Response;

use App\Core\Application\Response;
use App\Core\Application\User\DTO\UserDTO;
use App\Core\Application\ErrorCodes;

class UserResponse extends Response {

    public function __construct(
        bool $succes = false,
        string $message = '',
        public ErrorCodes|null $errorCode = null,
        public UserDto|null $data = null
        ) {
        parent::__construct(
            $succes,
            $message,
            $errorCode
        );
    }

    
}