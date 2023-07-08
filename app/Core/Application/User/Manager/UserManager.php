<?php

namespace App\Core\Application\User\Manager;

use App\Core\Application\Requests\CreateUserRequest;
use App\Core\Application\User\DTO\UserDTO;
use App\Core\Application\User\Ports\UserManagerInterface;
use App\Core\Application\User\Response\UserResponse;
use App\Core\Domain\Ports\UserRepositoryInterface;
use Exception;

class UserManager implements UserManagerInterface {


    public function __construct(private UserRepositoryInterface $userRepository)
    {
        
    }

    public function createUser(UserDTO $userDTO): UserResponse
    {
        try {
            $userEntity = $userDTO->mapToEntity();
            $storedUser = $this->userRepository->create($userEntity);
            print_r('aqui222');
            die(); 

            return new UserResponse(
                true,
                '',
                null,
            );
        } catch(Exception $e) {
            print_r($e->getMessage());
          print_r('aqui333');
          die();  
        }
    }

    public function teste()
    {
        $this->userRepository->get(1);
        print_r('aqui caraioooooooooooo');
        die();
    }
}