<?php

namespace App\Providers;

use App\GeneralSetting;
use App\Plugin;
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
        $viewShare['plugins'] = Plugin::all();
        $viewShare['general'] = GeneralSetting::first();
        view()->share($viewShare);
    }
}
