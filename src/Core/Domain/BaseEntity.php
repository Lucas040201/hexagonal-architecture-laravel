<?php

namespace Core\Domain;

use Core\Domain\DomainInterfaces\Entity\EntityInterface;

abstract class BaseEntity implements EntityInterface
{
    public function __construct()
    {
        $this->validateEntity();
    }
    abstract protected function validateEntity();

    public static function factory(array $data): static
    {
        return new static(...$data);
    }

}
