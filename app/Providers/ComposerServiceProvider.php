<?php

namespace App\Providers;

use App\Models\Admin\Setting\General;
use App\Models\Admin\Setting\SmtpSetup;
use Illuminate\Support\Facades\Config;
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
        $smtp = SmtpSetup::first();
            if($smtp)
            {
                $data = [
                    'transport' => $smtp->smtp_transport,
                    'host' => $smtp->smtp_host,
                    'port' => $smtp->smtp_port,
                    'encryption' => $smtp->smtp_encryption,
                    'username' => $smtp->smtp_username,
                    'password' => $smtp->smtp_password,
                    'from' => [
                        'name' => $smtp->smtp_from_name,
                        'address' => $smtp->smtp_from_email
                    ]
                ];
                Config::set('mail', $data);
            }
        view()->composer('*', function ($view) {


            $settings = General::first();
            $smtp = SmtpSetup::first();

            $view->with('settings', $settings);
            $view->with('smtp', $smtp);
        });
    }
}
