<?php

namespace Core\Domain\DomainExceptions\User;

class InvalidEmailException  extends \Exception
{
    public function __construct(string $message = "", int $code = 400, ?Throwable $previous = null)
    {
        $message = "Invalid email";
        parent::__construct($message, $code, $previous);
    }
}
