<?php
namespace Core\Domain\DomainExceptions\User;

class ShortNameOrSurnameException extends \Exception {
    public function __construct(string $message = "", int $code = 400, ?Throwable $previous = null, string $field)
    {
        $message = "The {$field} field is very short and needs to be at least 2 characters long";
        parent::__construct($message, $code, $previous);
    }
}
