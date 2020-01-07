<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class RolesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        Gate::define('role-profissional', function ($user) {
            return $user->checkGeneralRole('profissional');
        });
        Gate::define('role-administrador', function ($user) {
            return $user->checkGeneralRole('administrador');
        });
    }
}
