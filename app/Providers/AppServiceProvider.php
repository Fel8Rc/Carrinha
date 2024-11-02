<?php

namespace App\Providers;

use App\Models\categoria;
use App\Models\produto;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
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
        $categorasMenu = categoria::all();
        view()->share('categorasMenu', $categorasMenu);
        
        Gate::define('ver-produto', function (User $user, produto $produto) {
            return $user->id === $produto->user_id;
        });
    }
}
