<?php

namespace App\Core\Application\Interfaces\Validators;

use App\Core\Domain\Entities\Interfaces\EntityInterface;

interface ValidatorInterface {
    public function validate(EntityInterface $entity);
}
