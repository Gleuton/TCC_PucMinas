<?php

namespace App\Listeners;

use App\Events\SectorEvent;
use Laravel\Lumen\Application;
use PHPEasykafka\KafkaProducer;

class KafkaSectorListener
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
            'sector',
            $configs
        );
    }

    /**
     * Handle the event.
     *
     * @param SectorEvent $event
     *
     * @return void
     */
    public function handle(SectorEvent $event): void
    {
        $sector = $event->getModel();
        $this->producer->produce($sector->toJson());
    }
}
