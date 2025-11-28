<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
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
        Blade::directive("formatToRupiah", function($price) {
          return "{{ 'Rp ' . number_format($price, '0', ',', '.'); }}";
        });

        Blade::directive("formatNumber", function($num) {
          return "{{ number_format($num, '0', ',', '.'); }}";
        });
    }
}
