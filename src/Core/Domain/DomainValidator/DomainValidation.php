<?php

namespace Core\Domain\DomainValidator;

use Core\Domain\DomainExceptions\EntityValidationException;

class DomainValidation
{
    public static function notNull(string $value, string $message = null)
    {
        if (empty($value))
            throw new EntityValidationException($message ?? "Value cannot be empty.");
    }

    public static function strMaxLength(string $value, int $maxLength = 255, $message = null)
    {
        if (strlen($value) > $maxLength)
            throw new EntityValidationException($message ?? "Value can be a maximum of {$maxLength} characters.", 400);
    }

    public static function strMinLength(string $value, int $minLength = 2, $message = null)
    {
        if (strlen($value) < $minLength)
            throw new EntityValidationException($message ?? "Value can be at least {$minLength} characters.", 400);
    }

    public static function strFilterValidation($value, $filter, $message)
    {
        if(!filter_var($value, $filter)) {
            throw new EntityValidationException($message ?? "The filtered value is invalid", 400);
        }
    }
}



