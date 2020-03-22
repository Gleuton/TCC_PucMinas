<?php

namespace App\Providers;

use App\Events\{NcStatusEvent, NcTypeEvent};
use App\Listeners\{KafkaNcStatusListener, KafkaNcTypeListener};
use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        NcStatusEvent::class => [
            KafkaNcStatusListener::class,
        ],
        NcTypeEvent::class   => [
            KafkaNcTypeListener::class,
        ],
    ];
}
