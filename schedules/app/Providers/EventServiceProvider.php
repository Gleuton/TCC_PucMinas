<?php

namespace App\Providers;

use App\Events\{InterruptionEvent,
    SectorEvent,
    ProcessEvent,
    NonconformityEvent};

use App\Listeners\{KafkaInterruptionListener,
    KafkaSectorListener,
    KafkaProcessListener,
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

    ];
}
