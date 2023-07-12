<?php

namespace Core\Application\User\Manager;

use Core\Application\BaseManager;
use Core\Application\User\DTO\UserDTO;
use Core\Application\User\Ports\UserManagerInterface;
use Core\Application\User\Response\UserResponse;
use Core\Application\User\Validators\UserValidator;
use Core\Domain\Users\Ports\UserRepositoryInterface;

class UserManager extends baseManager implements UserManagerInterface {

    public function __construct(
        private UserRepositoryInterface $repository,
        private UserValidator           $validator,
        private UserResponse            $response,
        private UserDTO                 $dto
    )
    {
        parent::__construct($repository, $validator, $response, $dto);
    }
}
