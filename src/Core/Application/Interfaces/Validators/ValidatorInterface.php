<?php

namespace Core\Application\Interfaces\Validators;

use Core\Domain\Interfaces\Entity\EntityInterface;

interface ValidatorInterface {
    public function validateCreate(EntityInterface $entity);
    public function validateUpdate(EntityInterface $entity);
}
