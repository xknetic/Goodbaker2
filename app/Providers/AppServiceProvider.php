<?php

namespace App\Providers;

use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
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
        //
        // Share authenticated user and products globally with all Inertia pages
        Inertia::share([
            'user' => function () {
                return Auth::user(); // Share authenticated user
            },
            'products' => function () {
                return Product::all(); // Share products across pages
            },
        ]);
    }
}
