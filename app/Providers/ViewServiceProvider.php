<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\KontenWebsite;
use App\Models\Carousels;

class ViewServiceProvider extends ServiceProvider
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
        View::composer('*', function ($view) {
            $carousels = Carousels::all();
            $konten = KontenWebsite::first();
    
            $view->with('carousels', $carousels)
                ->with('konten', $konten);
        });
    }
}
