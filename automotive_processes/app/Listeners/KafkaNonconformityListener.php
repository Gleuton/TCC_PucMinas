<?php

namespace App\Listeners;

use App\Events\NcStatusEvent;
use App\Events\NonconformityEvent;
use Laravel\Lumen\Application;
use PHPEasykafka\KafkaProducer;

class KafkaNonconformityListener
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
            'nonconformity',
            $configs
        );
    }

    /**
     * Handle the event.
     *
     * @param NonconformityEvent $event
     *
     * @return void
     */
    public function handle(NonconformityEvent $event): void
    {
        $ncStatus = $event->getModel();
        $this->producer->produce($ncStatus->toJson());
    }
}
