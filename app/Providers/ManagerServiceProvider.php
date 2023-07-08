<?php

namespace App\Providers;

use App\Core\Application\User\Manager\UserManager;
use App\Core\Application\User\Ports\UserManagerInterface;
use App\Core\Domain\Ports\UserRepositoryInterface;
use App\Models\Users;
use App\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class ManagerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserManagerInterface::class, function() {
            return new UserManager($this->app->make(UserRepositoryInterface::class));
        });

        $this->app->bind(UserRepositoryInterface::class, function() {
            return new UserRepository($this->app->make(Users::class));
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
