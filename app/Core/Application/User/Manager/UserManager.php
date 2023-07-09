<?php

namespace App\Core\Application\User\Manager;

use App\Core\Application\Requests\CreateUserRequest;
use App\Core\Application\User\DTO\UserDTO;
use App\Core\Application\User\Ports\UserManagerInterface;
use App\Core\Application\User\Response\UserResponse;
use App\Core\Application\User\Validators\UserValidator;
use App\Core\Domain\Ports\UserRepositoryInterface;
use Exception;

class UserManager implements UserManagerInterface {


    public function __construct(
        private UserRepositoryInterface $userRepository,
        private UserValidator $userValidator
        )
    {

    }

    public function createUser(UserDTO $userDTO): UserResponse
    {
        try {
            $userEntity = $userDTO->mapToEntity();

            $this->userValidator->validate($userEntity);

            $storedUser = $this->userRepository->create($userEntity);

            return new UserResponse(
                true,
                '',
                null,

            );
        } catch(Exception $e) {
            throw new $e;
        }
    }

    public function teste()
    {
        $this->userRepository->get(1);
        print_r('aqui caraioooooooooooo');
        die();
    }
}
