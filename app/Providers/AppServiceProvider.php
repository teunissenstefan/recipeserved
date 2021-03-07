<?php

namespace App\Providers;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share("totalCountUsers", User::all()->count());
        view()->share("totalCountRecipes", Recipe::all()->count());
    }
}
