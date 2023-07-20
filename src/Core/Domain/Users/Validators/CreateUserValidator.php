<?php

namespace Core\Domain\Users\Validators;

use Core\Application\User\Exceptions\UserEmailAlreadyExistsException;
use Core\Application\User\Exceptions\UserPasswordIsTooWeakException;
use Core\Application\User\Exceptions\UserUsernameAlreadyExistsException;
use Core\Domain\Base\Validator\BaseValidator;
use Core\Domain\Users\Ports\UserRepositoryInterface;

class CreateUserValidator extends BaseValidator
{
    public function __construct(private UserRepositoryInterface $userRepository)
    {
    }

    public function validateEmail(string $email)
    {
        if ($this->userRepository->emailExists($email)) {
            throw new UserEmailAlreadyExistsException();
        }
    }

    public function validateUsername(string $username)
    {
        if ($this->userRepository->usernameExists($username)) {
            throw new UserUsernameAlreadyExistsException();
        }
    }

    public function validatePassword(string $password)
    {
        $uppercase    = preg_match('@[A-Z]@', $password);
        $lowercase    = preg_match('@[a-z]@', $password);
        $number       = preg_match('@[0-9]@', $password);
        $specialchars = preg_match('@[^\w]@', $password);

        if(!$specialchars || !$uppercase || !$lowercase || !$number || (strlen($password) < 3 || strlen($password) > 16)) {
            throw new UserPasswordIsTooWeakException();
        }
    }
}
