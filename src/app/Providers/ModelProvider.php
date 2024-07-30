<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;

class ModelProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $is_none_production = !config('app.env') !== 'production';
        Model::shouldBeStrict($is_none_production);
        Model::preventLazyLoading($is_none_production);
    }
}
