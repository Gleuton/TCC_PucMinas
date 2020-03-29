<?php

namespace App\Listeners;

use App\Events\SectorEvent;
use App\Events\ProcessEvent;
use Laravel\Lumen\Application;
use PHPEasykafka\KafkaProducer;

class KafkaProcessListener
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
            'process',
            $configs
        );
    }

    /**
     * Handle the event.
     *
     * @param ProcessEvent $event
     *
     * @return void
     */
    public function handle(ProcessEvent $event): void
    {
        $process = $event->getModel();
        $this->producer->produce($process->toJson());
    }
}
