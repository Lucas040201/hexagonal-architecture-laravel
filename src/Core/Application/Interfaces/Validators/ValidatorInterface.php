<?php

namespace Core\Application\Interfaces\Validators;

use Core\Domain\DomainInterfaces\Entity\EntityInterface;

interface ValidatorInterface {
    public function validateCreate(EntityInterface $entity);
    public function validateUpdate(EntityInterface $entity);
}
