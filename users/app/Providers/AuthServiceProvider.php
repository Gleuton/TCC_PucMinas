<?php

namespace App\Providers;

use App\Auth\TokenGuard;
use App\Models\User;
use App\Models\UserType;
use App\Policies\UserPolicy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() :void
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
        Gate::policy(User::class, UserPolicy::class);
        Gate::policy(UserType::class, UserPolicy::class);
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
