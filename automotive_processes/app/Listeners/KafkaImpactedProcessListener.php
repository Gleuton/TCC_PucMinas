<?php

namespace App\Listeners;

use App\Events\ImpactedProcessEvent;
use Laravel\Lumen\Application;
use PHPEasykafka\KafkaProducer;

class KafkaImpactedProcessListener
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
            'impacted_process',
            $configs
        );
    }

    /**
     * Handle the event.
     *
     * @param ImpactedProcessEvent $event
     *
     * @return void
     */
    public function handle(ImpactedProcessEvent $event): void
    {
        $ncStatus = $event->getModel();
        $this->producer->produce($ncStatus->toJson());
    }
}
