<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Requests\CreateUserRequestController;
use Core\Application\Users\CreateUser\CreateUserHandler;
use Core\Application\Users\CreateUser\CreateUserRequest;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class UserController extends BaseController
{

    use AuthorizesRequests, ValidatesRequests;

    public function __construct(
        private CreateUserHandler $createUserHandler
    )
    {}

    public function createUser(CreateUserRequestController $request) {
        try {
            $createUserDTO = $request->createDTO();
            $createUserRequest = new CreateUserRequest($createUserDTO);
            $this->createUserHandler->handle($createUserRequest);
            return response([
                'Success' => true,
                'message' => "SuccessFully Created!!"
            ]);
        } catch(UserEmailAlreadyExistsException|UserUsernameAlreadyExistsException $e) {
            return response([
                    'Success' => false,
                    'message' => $e->getMessage(),
                ], $e->getCode());
        } catch(EntityValidationException $e) {
            return response([
                'Success' => false,
                'message' => $e->getMessage(),
            ], $e->getCode());
        } catch(Exception $e) {
            return response([
                'Success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
