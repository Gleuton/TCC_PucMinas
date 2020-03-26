<?php

namespace App\Providers;

use App\Auth\TokenGuard;
use App\Models\ImpactedProcess;
use App\Models\NcStatus;
use App\Models\NcType;
use App\Models\Nonconformity;
use App\Models\UserType;
use App\Policies\NcStatusPolicy;
use App\Policies\NcTypePolicy;
use App\Policies\NonconformityPolicy;
use App\Policies\UserPolicy;
use App\User;
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

        Gate::policy(Nonconformity::class, NonconformityPolicy::class);
        Gate::policy(ImpactedProcess::class, NonconformityPolicy::class);
        Gate::policy(NcType::class, NcTypePolicy::class);
        Gate::policy(NcStatus::class, NcStatusPolicy::class);
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
