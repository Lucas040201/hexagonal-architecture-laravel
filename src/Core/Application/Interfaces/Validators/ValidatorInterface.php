<?php

namespace Core\Application\Interfaces\Validators;

use Core\Domain\Entities\Interfaces\EntityInterface;

interface ValidatorInterface {
    public function validate(EntityInterface $entity);
}
