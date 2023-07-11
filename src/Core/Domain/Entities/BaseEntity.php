<?php

namespace Core\Domain\Entities;

use Core\Domain\Entities\Interfaces\EntityInterface;

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
