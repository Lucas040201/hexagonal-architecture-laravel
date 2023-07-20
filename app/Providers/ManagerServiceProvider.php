<?php

namespace App\Providers;

use App\Models\Users;
use App\Repositories\Users\UserRepository;
use Core\Application\Users\CreateUser\CreateUserHandler;
use Core\Application\Users\Ports\CreateUserHandlerInterface;
use Core\Domain\Users\Ports\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class ManagerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CreateUserHandlerInterface::class, CreateUserHandler::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
