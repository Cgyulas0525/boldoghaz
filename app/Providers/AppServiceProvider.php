<?php

namespace App\Providers;

use App\Http\Controllers\DDDWController;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->booting(function() {
            $loader = AliasLoader::getInstance();
            $loader->alias('dddwClass', DDDWController::class);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('felhasználó', function() {
            return Auth::user()->userstatus_id == 1;
        });
        Gate::define('rendszergazda', function() {
            return Auth::user()->userstatus_id == 2;
        });
        Gate::define('fejlesztő', function() {
            return Auth::user()->userstatus_id == 3;
        });
    }
}
