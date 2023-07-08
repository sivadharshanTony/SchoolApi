<?php

namespace App\Providers;

use App\Repository\ProductRepository;
use Illuminate\Support\ServiceProvider;
use App\Repository\ProductRepositoryImpl;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ProductRepository::class,ProductRepositoryImpl::class);  
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
