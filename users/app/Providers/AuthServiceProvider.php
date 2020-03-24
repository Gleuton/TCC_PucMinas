<?php

namespace App\Providers;

use App\Auth\TokenGuard;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use App\Policies\AdminPolicy;

class AuthServiceProvider extends ServiceProvider
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
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->app->configure('auth');
        Gate::policy(User::class, AdminPolicy::class);
        Gate::policy(UserType::class, AdminPolicy::class);
        Auth::extend(
            'token',
            static function ($app, $name, $config) {
                return new TokenGuard(
                    $app['auth']->createUserProvider($config['provider']),
                    $app['request']
                );
            }
        );
    }
}
