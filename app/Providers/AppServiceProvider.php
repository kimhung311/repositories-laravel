<?php

namespace App\Providers;

use App\Repositories\BlogRepository;
use App\Repositories\Interfaces\BlogRepositoryInterface;
use App\Repositories\Interfaces\OrderRepositoryInterface;
use App\Repositories\Interfaces\RepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        // $this->app->bind(
        //     BlogRepositoryInterface::class, 
        //     BlogRepository::class,
        //     OrderRepositoryInterface::class,
        //     RepositoryInterface::class,
        //     OrderRepository::class
        // );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
