<?php

namespace App\Providers;

use App\Models\Users;
use App\Repositories\UserRepository;
use Core\Application\User\DTO\UserDTO;
use Core\Application\User\Response\UserResponse;
use Core\Application\User\Validators\UserValidator;
use Core\Domain\Entities\UserEntity;
use Illuminate\Support\ServiceProvider;
use Core\Application\User\Manager\UserManager;
use Core\Application\User\Ports\UserManagerInterface;
use Core\Domain\Ports\UserRepositoryInterface;

class ManagerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserManagerInterface::class, function() {
            return new UserManager(
                $this->app->make(UserRepositoryInterface::class),
            );
        });


        $this->app->bind(UserRepositoryInterface::class, function() {
            return new UserRepository(
                $this->app->make(Users::class),
                $this->app->make(UserEntity::class)
            );
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
