<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;

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
