<?php
namespace Core\Application\User\Exceptions;

use App\Core\Domain\DomainExceptions\User\Throwable;

class UserPasswordIsTooWeakException extends \Exception {
    public function __construct(string $message = "", int $code = 400, ?Throwable $previous = null)
    {
        $message = 'The password is very weak, it must contain at least one capital letter, one special character, one number and be between 6 and 16 characters long.';
        parent::__construct($message, $code, $previous);
    }
}


