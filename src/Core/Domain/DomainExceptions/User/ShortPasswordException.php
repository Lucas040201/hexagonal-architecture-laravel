<?php

namespace Core\Domain\DomainExceptions\User;

class ShortPasswordException extends \Exception
{
    public function __construct(string $message = "", int $code = 400, ?Throwable $previous = null)
    {
        $message = "Password must be between 6 to 16 characters";
        parent::__construct($message, $code, $previous);
    }

}
