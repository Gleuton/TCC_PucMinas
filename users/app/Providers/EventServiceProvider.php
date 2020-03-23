<?php

namespace App\Providers;

use App\Events\{UserEvent, UserTypeEvent};

use App\Listeners\{KafkaUserListener, KafkaUserTypeListener};

use Laravel\Lumen\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        UserTypeEvent::class => [
            KafkaUserTypeListener::class,
        ],
        UserEvent::class => [
            KafkaUserListener::class,
        ]
    ];
}
