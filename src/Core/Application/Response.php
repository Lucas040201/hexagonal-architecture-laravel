<?php

namespace Core\Application;

use Core\Application\Interfaces\DTO\DTOInterface;

abstract class Response {
    public function __construct(
        public bool $success = false,
        public string $message = '',
    ){}

    abstract public function actionCreatedResponse(DTOInterface $dto): array;
    abstract public function actionGetResponse(DTOInterface $dto): array;
    abstract public function actionUpdatedResponse(): array;
    abstract public function actionDeletedResponse(): array;
}
