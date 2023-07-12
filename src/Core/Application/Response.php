<?php

namespace Core\Application;

use Core\Application\Interfaces\DTO\DTOInterface;
use Core\Application\Interfaces\Response\ResponseInterface;

abstract class Response implements ResponseInterface {
    public function __construct(
        public bool $success = false,
        public string $message = '',
    ){}

    abstract public function actionCreatedResponse(DTOInterface $dto): array;
    abstract public function actionGetResponse(DTOInterface $dto): array;
    abstract public function actionUpdatedResponse(): array;
    abstract public function actionDeletedResponse(): array;
}
