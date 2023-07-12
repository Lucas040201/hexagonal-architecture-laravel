<?php

namespace Core\Application\Interfaces\DTO;

use Core\Domain\Interfaces\Entity\EntityInterface;

interface DTOInterface {
    public function mapToEntity(): EntityInterface;
    public static function mapEntityToDTO(EntityInterface $entity): DTOInterface;
}
