<?php

namespace App\Providers;

use App\Repositories\AccountRepository;
use App\Repositories\AccountRepositoryInterface;
use App\Repositories\IdentifierRepository;
use App\Repositories\IdentifierRepositoryInterface;
use App\Repositories\MasterMaintenance\PrefectureRepository;
use App\Repositories\MasterMaintenance\PrefectureRepositoryInterface;
use App\Repositories\NewsReadRepository;
use App\Repositories\NewsReadRepositoryInterface;
use App\Repositories\NewsRepository;
use App\Repositories\NewsRepositoryInterface;
use App\Repositories\OperatorRepository;
use App\Repositories\OperatorRepositoryInterface;
use App\Repositories\RegistrationOperatorApplyRepository;
use App\Repositories\RegistrationOperatorApplyRepositoryInterface;
use App\Repositories\UnauthenticatedUserRepository;
use App\Repositories\UnauthenticatedUserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PrefectureRepositoryInterface::class, PrefectureRepository::class);
        $this->app->bind(UnauthenticatedUserRepositoryInterface::class, UnauthenticatedUserRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(OperatorRepositoryInterface::class, OperatorRepository::class);
        $this->app->bind(AccountRepositoryInterface::class, AccountRepository::class);
        $this->app->bind(NewsRepositoryInterface::class, NewsRepository::class);
        $this->app->bind(NewsReadRepositoryInterface::class, NewsReadRepository::class);
        $this->app->bind(IdentifierRepositoryInterface::class, IdentifierRepository::class);
        $this->app->bind(RegistrationOperatorApplyRepositoryInterface::class, RegistrationOperatorApplyRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
