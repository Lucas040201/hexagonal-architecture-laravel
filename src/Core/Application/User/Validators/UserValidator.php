<?php

namespace Core\Application\User\Validators;

use Core\Application\Interfaces\Validators\ValidatorInterface;
use Core\Application\User\Exceptions\UserEmailAlreadyExistsException;
use Core\Application\User\Exceptions\UserPasswordIsTooWeakException;
use Core\Application\User\Exceptions\UserUsernameAlreadyExistsException;
use Core\Domain\DomainInterfaces\Entity\EntityInterface;
use Core\Domain\Users\Ports\UserRepositoryInterface;

class UserValidator implements ValidatorInterface {

    public function __construct(
        private UserRepositoryInterface $userRepository
    )
    {}

    /**
     * @throws UserPasswordIsTooWeakException
     * @throws UserEmailAlreadyExistsException
     */
    public function validateCreate(EntityInterface $entity): void
    {
        $this->emailExists($entity->email);
        $this->passwordStrength($entity->password);
    }

    public function validateUpdate(EntityInterface $entity)
    {
        // TODO: Implement validateUpdate() method.
    }

    /**
     * @throws UserPasswordIsTooWeakException
     */
    public function passwordStrength(string $password): void
    {
        $uppercase    = preg_match('@[A-Z]@', $password);
        $lowercase    = preg_match('@[a-z]@', $password);
        $number       = preg_match('@[0-9]@', $password);
        $specialchars = preg_match('@[^\w]@', $password);

        if(!$specialchars || !$uppercase || !$lowercase || !$number || (strlen($password) < 3 || strlen($password) > 16)) {
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
