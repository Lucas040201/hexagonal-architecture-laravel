<?php

namespace Core\Application\User\Manager;

use Core\Application\BaseManager;
use Core\Application\Interfaces\DTO\DTOInterface;
use Core\Application\Interfaces\Response\ResponseInterface;
use Core\Application\Interfaces\Validators\ValidatorInterface;
use Dotenv\Repository\RepositoryInterface;
use Exception;
use Core\Application\User\DTO\UserDTO;
use Core\Application\User\Ports\UserManagerInterface;
use Core\Application\User\Response\UserResponse;
use Core\Application\User\Validators\UserValidator;
use Core\Domain\Ports\UserRepositoryInterface;

class UserManager extends baseManager implements UserManagerInterface {

    public function __construct(
        private UserRepositoryInterface $repository,
        private UserValidator           $validator,
        private UserResponse            $response,
    )
    {
        parent::__construct($repository, $validator, $response);
    }
}
