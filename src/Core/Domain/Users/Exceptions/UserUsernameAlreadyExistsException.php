<?php
namespace Core\Application\User\Exceptions;

use App\Core\Domain\DomainExceptions\User\Throwable;

class UserUsernameAlreadyExistsException extends \Exception {
    public function __construct(string $message = "User Username Already Exists", int $code = 400, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}


