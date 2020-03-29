<?php

namespace App\Listeners;

use App\Events\InterruptionEvent;
use Laravel\Lumen\Application;
use PHPEasykafka\KafkaProducer;

class KafkaInterruptionListener
{
    private KafkaProducer $producer;

    /**
     * Create the event listener.
     *
     * @param Application $container
     */
    public function __construct(Application $container)
    {
        $configs = $container->get('kafkaTopicConfig');
        $brokerCollection = $container->get('KafkaBrokerCollection');

        $this->producer = new KafkaProducer(
            $brokerCollection,
            'interruption',
            $configs
        );
    }

    /**
     * Handle the event.
     *
     * @param InterruptionEvent $event
     *
     * @return void
     */
    public function handle(InterruptionEvent $event): void
    {
        $interruption = $event->getModel();
        $this->producer->produce($interruption->toJson());
    }
}
