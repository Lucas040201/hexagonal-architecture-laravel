<?php

namespace Core\Application\Interfaces\DTO;

use Core\Domain\DomainInterfaces\Entity\EntityInterface;

interface DTOInterface {
    public function mapToEntity(): EntityInterface;
    public static function mapEntityToDTO(EntityInterface $entity): DTOInterface;
    public static function updateDto(array $data): DTOInterface;
}
