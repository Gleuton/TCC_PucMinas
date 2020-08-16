<?php

namespace App\Providers;

use App\Auth\TokenGuard;

use App\Models\Schedule;
use App\Models\ScheduleStatus;
use App\Models\ScheduleType;
use App\Policies\ScheduleStatusPolicy;
use App\Policies\ScheduleTypePolicy;
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
        Gate::policy(ScheduleStatus::class, ScheduleStatusPolicy::class);
        Gate::policy(ScheduleType::class, ScheduleTypePolicy::class);

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
