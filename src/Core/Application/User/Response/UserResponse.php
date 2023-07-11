<?php

namespace Core\Application\User\Response;

use Core\Application\ErrorCodes;
use Core\Application\Interfaces\DTO\DTOInterface;
use Core\Application\Response;
use Core\Application\User\DTO\UserDTO;

class UserResponse extends Response {

    public function __construct(
        public bool                      $success = false,
        public string                    $message = '',
        ) {
    }

    public function actionCreatedResponse(UserDTO|DTOInterface $dto): array
    {
        return [
            'success' => $this->success,
            'message' => $this->message,
            'data' => [
                'id' => $dto->id,
                'name' => $dto->name,
                'surname' => $dto->surname,
                'email' => $dto->email
            ]
        ];
    }

    public function actionGetResponse(UserDTO|DTOInterface $dto): array
    {
        // TODO: Implement actionGetResponse() method.
    }

    public function actionUpdatedResponse(): array
    {
        // TODO: Implement actionUpdatedResponse() method.
    }

    public function actionDeletedResponse(): array
    {
        // TODO: Implement actionDeletedResponse() method.
    }
}
