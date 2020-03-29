<?php

namespace App\Providers;

use App\Auth\TokenGuard;
use App\Models\Interruption;
use App\Models\Process;
use App\Models\Sector;
use App\Policies\InterruptionPolicy;
use App\Policies\ProcessPolicy;
use App\Policies\SectorPolicy;
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
    public function register(): void
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

        Gate::policy(Sector::class, SectorPolicy::class);
        Gate::policy(Interruption::class, InterruptionPolicy::class);
        Gate::policy(Process::class, ProcessPolicy::class);

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
