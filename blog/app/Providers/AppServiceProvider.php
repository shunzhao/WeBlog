<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Info;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $info = new Info();
        view()->share('Web',$info->all()[0]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
