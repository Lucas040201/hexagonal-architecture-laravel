<?php

namespace Core\Application\User\Validators;

use Core\Application\Interfaces\Validators\ValidatorInterface;
use Core\Application\User\Exceptions\UserEmailAlreadyExistsException;
use Core\Application\User\Exceptions\UserUsernameAlreadyExistsException;
use Core\Domain\Entities\Interfaces\EntityInterface;
use Core\Domain\Ports\UserRepositoryInterface;

class UserValidator implements ValidatorInterface {

    public function __construct(
        private UserRepositoryInterface $userRepository
    )
    {}

    public function validate(EntityInterface $entity): void
    {
        $this->emailExists($entity->email);
//        $this->usernameExists($entity->username);
    }

    /**
     * @throws UserEmailAlreadyExistsException
     */
    private function emailExists(string $email): void
    {
        if($this->userRepository->emailExists($email)) {
            throw new UserEmailAlreadyExistsException();
        }
    }

    /**
     * @throws UserUsernameAlreadyExistsException
     */
    private function usernameExists(string $username): void
    {
        if($this->userRepository->usernameExists($username)) {
            throw new UserUsernameAlreadyExistsException();
        };
    }

}
