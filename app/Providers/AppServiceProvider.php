<?php

namespace App\Providers;

use App\Services\BalanceService;
use App\Repositories\UserRepository;
use App\Repositories\BalanceRepository;
use App\Repositories\BalanceTransactionRepository;
use App\Services\Ports\IBalanceService;
use Illuminate\Support\ServiceProvider;
use App\Repositories\Ports\IUserRepository;
use App\Repositories\Ports\IBalanceRepository;
use App\Repositories\Ports\IBalanceTransactionRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IBalanceRepository::class, BalanceRepository::class);
        $this->app->bind(IBalanceService::class, BalanceService::class);
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(IBalanceTransactionRepository::class, BalanceTransactionRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
