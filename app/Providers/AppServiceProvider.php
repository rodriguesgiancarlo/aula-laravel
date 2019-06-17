<?php

namespace App\Providers;

use Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

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
    public function boot() {
        Schema::defaultStringLength(191);

        Gate::define('permissoes.index', function ($user) {
            return $user->hasPermission('ADMINISTRADOR') || $user->hasPermission('GERENTE');
        });
        Gate::define('permissoes.edit', function ($user) {
            return $user->hasPermission('ADMINISTRADOR');
        });

        
        
        Gate::define('cervejarias.index', function ($user) {
            return $user->hasPermission('ADMINISTRADOR')
                || $user->hasPermission('GERENTE')
                || $user->hasPermission('USUÁRIO');
        });
        Gate::define('cervejarias.create', function ($user) {
            return $user->hasPermission('ADMINISTRADOR')
                || $user->hasPermission('GERENTE');
        });


        
        Gate::define('cervejas.index', function ($user) {
            return $user->hasPermission('ADMINISTRADOR')
                || $user->hasPermission('GERENTE')
                || $user->hasPermission('USUÁRIO');
        });
        Gate::define('cervejas.create', function ($user) {
            return $user->hasPermission('ADMINISTRADOR')
                || $user->hasPermission('GERENTE');
        });
        Gate::define('cervejas.edit', function ($user) {
            return $user->hasPermission('ADMINISTRADOR')
                || $user->hasPermission('GERENTE');
        });

    }
}
