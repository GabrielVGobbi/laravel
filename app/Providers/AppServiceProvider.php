<?php

namespace App\Providers;

use App\Models\User;
use App\Observers\UserObserve;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        setlocale(LC_TIME, 'pt-br');
        date_default_timezone_set('America/Sao_Paulo');

        User::observe(UserObserve::class);
    }
}
