<?php

namespace Core\Domain\Base\Validator;

use Core\Domain\DomainExceptions\ValidatorException;

abstract class BaseValidator
{
    protected function assertArray($data)
    {
        if(!is_array($data)) {
            throw new ValidatorException('The provided data is not an array');
        }
    }

    protected function assetString($data)
    {
        if(!is_string($data)) {
            throw new ValidatorException('The provided data is not a string');
        }
    }
}
