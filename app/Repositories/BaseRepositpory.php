<?php

namespace App\Repositories;

use App\Models\Interfaces\ModelInterface;
use Core\Domain\Interfaces\Entity\EntityInterface;
use Core\Domain\Users\Interfaces\BaseRepositoryInterface;


abstract class BaseRepositpory implements BaseRepositoryInterface
{
    public function __construct(
        protected ModelInterface $model,
        protected EntityInterface $entity
    )
    {
    }

    public function get(int $id): EntityInterface
    {
        $item = $this->model->findById($id);
        return $this->entity::factory($item);
    }

    public function create(EntityInterface $item): EntityInterface
    {
        $response = $this->model->create((array) $item);
        $storedData = $response->attributesToArray();
        return $this->entity::factory($storedData);
    }

    public function update(int $id, $data)
    {
    }

    public function delete(int $id)
    {

    }

}
