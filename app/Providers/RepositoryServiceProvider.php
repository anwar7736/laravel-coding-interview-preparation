<?php

namespace App\Providers;

use App\Modules\Product\Repositories\Interfaces\ProductRepositoryInterface;
use App\modules\product\repositories\interfaces\TransactionRepositoryInterface;
use App\Modules\Product\Repositories\ProductRepository;
use App\modules\product\repositories\TransactionRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );

        $this->app->bind(
            TransactionRepositoryInterface::class,
            TransactionRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
