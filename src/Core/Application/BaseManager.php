<?php

namespace Core\Application;

use Core\Application\Interfaces\DTO\DTOInterface;
use Core\Application\Interfaces\Response\ResponseInterface;
use Core\Application\Interfaces\Validators\ValidatorInterface;
use Core\Domain\Interfaces\BaseRepositoryInterface;

abstract class BaseManager
{
    public function __construct(
        private $repository,
        private $validator,
        private $response
    )
    {
    }

    public function create(DTOInterface $dto): array
    {
        try {
            $entity = $dto->mapToEntity();

            $this->validator->validate($entity);

            $storedData = $this->repository->create($entity);
            $this->response->success = true;
            $this->response->message = 'Successfully Created';
            return $this->response->actionCreatedResponse(
                $dto::mapEntityToDTO($storedData),
            );
        } catch(Exception $e) {
            throw new $e;
        }
    }

    public function get(int $id): array
    {

    }

    public function update(int $id, DTOInterface $userDTO): array
    {

    }

    public function delete(int $id): array
    {

    }

}
