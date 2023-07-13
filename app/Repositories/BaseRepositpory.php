<?php

namespace App\Repositories;

use App\Models\Interfaces\ModelInterface;
use Core\Domain\DomainInterfaces\Entity\EntityInterface;
use Core\Domain\DomainInterfaces\Repository\BaseRepositoryInterface;


abstract class BaseRepositpory implements BaseRepositoryInterface
{
    public function __construct(
        protected ModelInterface $model,
    )
    {
    }

    public function get(int $id): array
    {
        $response = $this->model->findById($id);
        return $response->attributesToArray();
    }

    public function create(EntityInterface $item): void
    {
        $this->model->create((array) $item);
    }

    public function update(int $id, $data)
    {
    }

    public function delete(int $id)
    {

    }

}
