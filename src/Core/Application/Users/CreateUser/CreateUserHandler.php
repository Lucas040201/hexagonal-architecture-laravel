<?php
namespace Core\Application\Users\CreateUser;

use Core\Application\Contracts\Request\RequestInterface;
use Core\Application\Users\Ports\CreateUserHandlerInterface;
use Core\Domain\Users\Entities\UserEntity;
use Core\Domain\Users\UseCases\CreateUserUseCase;

class CreateUserHandler implements CreateUserHandlerInterface
{
    public function __construct(private readonly CreateUserUseCase $createUserUseCase)
    {
    }

    public function handle(CreateUserRequest|RequestInterface $request)
    {
        $createUserDto = $request->getDto();
        $user = new UserEntity();
        $user->setName($createUserDto->getName());
        $user->setSurname($createUserDto->getSurname());
        $user->setEmail($createUserDto->getEmail());
        $user->setPassword($createUserDto->getPassword());
        return $this->createUserUseCase->execute($user);
    }
}
