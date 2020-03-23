<?php

namespace App\Listeners;

use App\Events\UserTypeEvent;
use Laravel\Lumen\Application;
use PHPEasykafka\KafkaProducer;

class KafkaUserTypeListener
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
            'user_type',
            $configs
        );
    }

    /**
     * Handle the event.
     *
     * @param UserTypeEvent $event
     *
     * @return void
     */
    public function handle(UserTypeEvent $event): void
    {
        $ncStatus = $event->getModel();
        $this->producer->produce($ncStatus->toJson());
    }
}
