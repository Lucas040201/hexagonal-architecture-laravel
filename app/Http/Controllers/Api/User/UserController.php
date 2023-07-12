<?php

namespace App\Http\Controllers\Api\User;

use App\Http\Requests\CreateUserRequestController;
use Core\Application\User\Exceptions\UserEmailAlreadyExistsException;
use Core\Application\User\Exceptions\UserUsernameAlreadyExistsException;
use Core\Application\User\Manager\UserManager;
use Core\Domain\DomainExceptions\EntityValidationException;
use Exception;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class UserController extends BaseController
{

    use AuthorizesRequests, ValidatesRequests;

    public function __construct(
        private UserManager $userManager
    )
    {}

    public function createUser(CreateUserRequestController $request) {
        try {
            $userDTO = $request->createDTO();
            return response($this->userManager->create($userDTO));
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
