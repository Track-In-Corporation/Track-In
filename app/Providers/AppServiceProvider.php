<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        URL::forceScheme('https');
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive("formatToRupiah", function($price) {
          return "{{ 'Rp ' . number_format($price, '0', ',', '.'); }}";
        });

        Blade::directive("formatNumber", function($num) {
          return "{{ number_format($num, '0', ',', '.'); }}";
        });

        Blade::directive("formatImage", function($imagePath) {
            return "{{ str_contains($imagePath, 'picsum') ? $imagePath : url('/') . '/' . $imagePath }}";
        });
    }
}
