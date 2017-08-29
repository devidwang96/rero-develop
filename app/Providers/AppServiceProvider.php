<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Response;
use DB;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
//        DB::listen(function($query){
//            dump($query->sql);
//        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() === 'local') {
            $this->app->register('\Barryvdh\Debugbar\ServiceProvider');
        }
    }
}
