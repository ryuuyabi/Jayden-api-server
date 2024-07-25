<?php

namespace App\Providers;

use App\Models\MailMagazine;
use App\Models\NewsModel;
use App\Models\Operator;
use App\Observers\OperatorActiveObserver;
use Illuminate\Support\ServiceProvider;

class ObserverProvider extends ServiceProvider
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
        Operator::observe(OperatorActiveObserver::class);
        NewsModel::observe(OperatorActiveObserver::class);
        MailMagazine::observe(OperatorActiveObserver::class);
    }
}
