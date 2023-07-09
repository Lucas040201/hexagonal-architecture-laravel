<?php

namespace App\Core\Domain\Entities\Interfaces;

interface EntityInterface {
    public function populateEntity(array $data);
}