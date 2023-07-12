<?php

namespace Core\Application;

use Core\Application\Interfaces\DTO\DTOInterface;
use Core\Application\Interfaces\Response\ResponseInterface;
use Core\Application\Interfaces\Validators\ValidatorInterface;
use Core\Domain\Users\Interfaces\BaseRepositoryInterface;

abstract class BaseManager
{
    public function __construct(
        private BaseRepositoryInterface $repository,
        private ValidatorInterface $validator,
        private ResponseInterface $response,
        private DTOInterface $dtoBase
    )
    {
    }

    public function create(DTOInterface $dto): array
    {
        try {
            $entity = $dto->mapToEntity();

            $this->validator->validateCreate($entity);

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
        try {
            $storedData = $this->repository->get($id);

            $this->response->success = true;
            return $this->response->actionGetResponse(
                $this->dtoBase::mapEntityToDTO($storedData),
            );
        } catch(Exception $e) {
            throw new $e;
        }
    }

    public function update(int $id, DTOInterface $userDTO): array
    {

    }

    public function delete(int $id): array
    {

    }

}
