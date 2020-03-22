<?php

namespace App\Listeners;

use App\Events\NcStatusEvent;
use Laravel\Lumen\Application;
use PHPEasykafka\KafkaProducer;

class KafkaNcStatusListener
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
            'ncstatus',
            $configs
        );
    }

    /**
     * Handle the event.
     *
     * @param NcStatusEvent $event
     *
     * @return void
     */
    public function handle(NcStatusEvent $event)
    {
        $ncStatus = $event->getModel();
        $this->producer->produce($ncStatus->toJson());
    }
}
