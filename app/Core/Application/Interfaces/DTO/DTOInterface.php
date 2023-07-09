<?php

namespace App\Core\Application\Interfaces\DTO;

use App\Core\Domain\Entities\Interfaces\EntityInterface;

interface DTOInterface {
    public function mapToEntity(): EntityInterface;
}