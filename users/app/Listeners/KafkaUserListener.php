<?php

namespace App\Listeners;

use App\Events\UserEvent;
use Laravel\Lumen\Application;
use PHPEasykafka\KafkaProducer;

class KafkaUserListener
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
            'user',
            $configs
        );
    }

    /**
     * Handle the event.
     *
     * @param UserEvent $event
     *
     * @return void
     */
    public function handle(UserEvent $event): void
    {
        $user = $event->getModel();
        $this->producer->produce($user->toJson());
    }
}
