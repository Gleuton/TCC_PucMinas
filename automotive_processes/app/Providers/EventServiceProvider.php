<?php

namespace App\Providers;

use App\Events\{ImpactedProcessEvent,
    NcStatusEvent,
    NcTypeEvent,
    NonconformityEvent};

use App\Listeners\{KafkaImpactedProcessListener,
    KafkaNcStatusListener,
    KafkaNcTypeListener,
    KafkaNonconformityListener};

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
        NonconformityEvent::class   => [
            KafkaNonconformityListener::class,
        ],
        ImpactedProcessEvent::class   => [
            KafkaImpactedProcessListener::class,
        ]
    ];
}
