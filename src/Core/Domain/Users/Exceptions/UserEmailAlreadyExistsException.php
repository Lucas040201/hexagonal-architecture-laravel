<?php
namespace Core\Application\User\Exceptions;

class UserEmailAlreadyExistsException extends \Exception {
    public function __construct(string $message = "User Email Already Exists", int $code = 400, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}


