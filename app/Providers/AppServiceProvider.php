<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ImageManager::class, function ($app) {
            return new ImageManager(new Driver()); // Inisialisasi dengan driver GD
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Global constraint untuk parameter {name}, hanya boleh huruf (A-Z, a-z)
        Route::pattern('nameGlobal', '[A-Za-z]+');

        // Global constraint untuk parameter {id}, hanya boleh angka
        Route::pattern('idGlobal', '[0-9]+');
    }
}
