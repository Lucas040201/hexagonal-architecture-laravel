<?php
namespace Core\Domain\Users\UseCases;

use Core\Domain\Users\Entities\UserEntity;
use Core\Domain\Users\Services\UserService;

class CreateUserUseCase
{
    public function __construct(private UserService $userService)
    {}

    public function execute(UserEntity $user)
    {
        $this->userService->create($user);
    }
}
