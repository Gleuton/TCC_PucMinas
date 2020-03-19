<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Laravel\Lumen\Application;

class KafkaConsumer extends Command
{
    private array $handlers = [

    ];
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kafka:consume {topic} {group}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'kafka consumer [topic] [group]';


    /**
     * Execute the console command.
     *
     * @param Application $container
     *
     * @return mixed
     * @throws \Exception
     */
    public function handle(Application $container): void
    {
        $topic = $this->argument('topic');
        $group = $this->argument('group');

        $configs = $container->get('kafkaTopicConfig');
        $brokerCollection = $container->get('KafkaBrokerCollection');
        $consumer = new \PHPEasykafka\KafkaConsumer(
            $brokerCollection,
            [$topic],
            $group,
            $configs,
            $container
        );

        $this->info('Consuming topic ' . $topic . ' from kafka');

        //$consumer->consume(500 * 10000, [$this->handlers[$topic]]);
    }
}