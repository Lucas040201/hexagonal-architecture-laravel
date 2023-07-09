<?php

namespace App\Http\Controllers\Api\User;

use App\Core\Application\User\Manager\UserManager;
use App\Core\Domain\DomainExceptions\User\UserEmailAlreadyExistsException;
use App\Core\Domain\DomainExceptions\User\UserUsernameAlreadyExistsException;
use App\Http\Requests\CreateUserRequestController;
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
            return $this->userManager->createUser($userDTO);
        } catch(UserEmailAlreadyExistsException|UserUsernameAlreadyExistsException $e) {
            return response([
                    'Success' => false,
                    'message' => $e->getMessage(),
                ], 400);
        } catch(Exception) {

        }
    }
}
