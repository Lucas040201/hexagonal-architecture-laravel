<?php

namespace Core\Domain\Users\Interfaces;

use Core\Domain\Interfaces\Entity\EntityInterface;

interface BaseRepositoryInterface
{
    public function get(int $id): \Core\Domain\Interfaces\Entity\EntityInterface;
    public function create(\Core\Domain\Interfaces\Entity\EntityInterface $user): EntityInterface;
    public function update(int $id, \Core\Domain\Interfaces\Entity\EntityInterface $user);
    public function delete(int $id);
}
