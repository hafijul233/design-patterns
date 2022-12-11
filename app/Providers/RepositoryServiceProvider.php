<?php

namespace App\Providers;

use App\Repositories\Interface\PaymentRepositoryInterface;
use App\Repositories\Payment\BkashRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(PaymentRepositoryInterface::class, BkashRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
