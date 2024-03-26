<?php

namespace App\Providers;

use App\Models\Admin\Setting\General;
use App\Models\Admin\Setting\SmtpSetup;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
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
        view()->composer('*', function ($view) {

            $settings = General::first();
            $smtp = SmtpSetup::first();

            $view->with('settings', $settings);
            $view->with('smtp', $smtp);
        });
    }
}
