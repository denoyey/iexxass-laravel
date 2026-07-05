<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\RateLimiter;
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
        Blueprint::macro('sortable', function () {
            $this->integer('order_column')->default(0);
        });
        // Rate Limiting / Blocking
        $this->ConfigurationRateLimiting();

        // Translate
        if (session()->has('locale')) {
            App::setLocale(session('locale'));
        }
    }

    public function ConfigurationRateLimiting()
    {
        // Rate Limiting / Blocking
        RateLimiter::for('guest', function (Request $request) {
            return $request->user()
                ? Limit::none()
                : Limit::perMinute(100)->by($request->ip());
        });
    }
}
