<?php

namespace App\Providers;

use Dotenv\Dotenv;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $appEnvironment = env('APP_ENV', 'productie');

        switch ($appEnvironment) {
            case 'ontwikkeling':
                $envFile = '.env.ontwikkeling';
                break;
            case 'testing':
                $envFile = '.env.testing';
                break;
            case 'acceptatie':
                $envFile = '.env.acceptatie';
                break;
            case 'productie':
            default:
                $envFile = '.env.productie';
                break;
        }

        $dotenv = Dotenv::createImmutable(base_path(), $envFile);
        $dotenv->load();
    }
}
