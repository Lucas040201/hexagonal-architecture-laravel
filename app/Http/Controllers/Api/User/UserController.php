<?php

namespace App\Http\Controllers\Api\User;

use App\Core\Application\User\Manager\UserManager;
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
        } catch(Exception) {

        }
    }
}
