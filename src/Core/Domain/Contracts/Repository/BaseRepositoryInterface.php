<?php

namespace Core\Domain\Contracts\Repository;

use Core\Domain\Contracts\Entity\EntityInterface;

interface BaseRepositoryInterface
{
    public function get(int $id): array;
    public function create(EntityInterface $user): void;
    public function update(int $id, EntityInterface $user);
    public function delete(int $id);
}
