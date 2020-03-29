<?php

namespace App\Listeners;

use App\Events\SectorEvent;
use App\Events\NcTypeEvent;
use Laravel\Lumen\Application;
use PHPEasykafka\KafkaProducer;

class KafkaNcTypeListener
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
            'nctype',
            $configs
        );
    }

    /**
     * Handle the event.
     *
     * @param NcTypeEvent $event
     *
     * @return void
     */
    public function handle(NcTypeEvent $event): void
    {
        $ncType = $event->getModel();
        $this->producer->produce($ncType->toJson());
    }
}
