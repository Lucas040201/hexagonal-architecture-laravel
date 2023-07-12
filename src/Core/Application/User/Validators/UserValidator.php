<?php

namespace Core\Application\User\Validators;

use Core\Application\Interfaces\Validators\ValidatorInterface;
use Core\Application\User\Exceptions\UserEmailAlreadyExistsException;
use Core\Application\User\Exceptions\UserPasswordIsTooweakException;
use Core\Application\User\Exceptions\UserUsernameAlreadyExistsException;
use Core\Domain\Entities\Interfaces\EntityInterface;
use Core\Domain\Ports\UserRepositoryInterface;

class UserValidator implements ValidatorInterface {

    public function __construct(
        private UserRepositoryInterface $userRepository
    )
    {}

    /**
     * @throws UserPasswordIsTooweakException
     * @throws UserEmailAlreadyExistsException
     */
    public function validate(EntityInterface $entity): void
    {
        $this->emailExists($entity->email);
        $this->passwordStrength();
//        $this->usernameExists($entity->username);
    }

    public function passwordStrength(string $password)
    {
        $uppercase    = preg_match('@[A-Z]@', $password);
        $lowercase    = preg_match('@[a-z]@', $password);
        $number       = preg_match('@[0-9]@', $password);
        $specialchars = preg_match('@[^\w]@', $password);

        if(!$specialchars || !$uppercase || !$lowercase || !$number) {
            throw new UserPasswordIsTooWeakException();
        }
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
