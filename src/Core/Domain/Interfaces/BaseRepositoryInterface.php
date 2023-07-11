<?php

namespace Core\Domain\Interfaces;

use Core\Domain\Entities\Interfaces\EntityInterface;

interface BaseRepositoryInterface
{
    public function get(int $id): EntityInterface;
    public function create(EntityInterface $user): EntityInterface;
    public function update(int $id, EntityInterface $user);
    public function delete(int $id);
}
