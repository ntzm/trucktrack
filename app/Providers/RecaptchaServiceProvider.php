<?php

namespace App\Providers;

use App\Recaptcha\RecaptchaVerifier;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class RecaptchaServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Validator::extend('recaptcha', function ($attribute, $value) {
            return $this->app[RecaptchaVerifier::class]->verify($value);
        });
    }

    public function register()
    {
        $this->app->singleton(RecaptchaVerifier::class, function () {
            return new RecaptchaVerifier(
                new Client(),
                $this->app['config']->get('services.recaptcha.secret.key')
            );
        });
    }
}
