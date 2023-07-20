<?php

namespace Core\Domain\Users\Services;

use Core\Domain\Users\Entities\UserEntity;
use Core\Domain\Users\Ports\UserRepositoryInterface;
use Core\Domain\Users\Validators\CreateUserValidator;

class UserService
{
    public function __construct(
        private UserRepositoryInterface $userRepository,
        private CreateUserValidator $validator
    )
    {

    }

    public function create(UserEntity $user)
    {
        $this->validator->validateEmail($user->getEmail());
        $this->validator->validatePassword($user->getPassword());
        $this->userRepository->create($user);
    }
}
