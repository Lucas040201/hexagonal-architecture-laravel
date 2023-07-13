<?php

namespace Core\Application;

use Core\Application\Interfaces\DTO\DTOInterface;
use Core\Application\Interfaces\Response\ResponseInterface;
use Core\Application\Interfaces\Validators\ValidatorInterface;
use Core\Domain\DomainInterfaces\Repository\BaseRepositoryInterface;

abstract class BaseManager
{
    public function __construct(
        private readonly BaseRepositoryInterface $repository,
        private readonly ValidatorInterface      $validator,
        private readonly ResponseInterface       $response,
        private readonly DTOInterface            $dtoBase
    )
    {
    }

    public function create(DTOInterface $dto): array
    {
        try {
            $entity = $dto->mapToEntity();
            $this->validator->validateCreate($entity);

            $this->repository->create($entity);
            $this->response->success = true;
            $this->response->message = 'Successfully Created';
            return $this->response->actionCreatedResponse();
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
