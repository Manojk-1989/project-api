<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\ProductInterface;
use App\Repository\ProductRepository;
use App\Repository\AddToCartInterface;
use App\Repository\AddToCartRepository;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductInterface::class, ProductRepository::class);
        $this->app->bind(AddToCartInterface::class, AddToCartRepository::class);


    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
