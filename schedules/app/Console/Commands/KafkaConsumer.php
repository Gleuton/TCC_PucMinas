<?php

namespace App\Console\Commands;

use App\Kafka\{NcStatusHandler,
    NcTypeHandler,
    NonconformityHandler,
    UserTypeHandler,
    UserHandler};
use Illuminate\Console\Command;
use Laravel\Lumen\Application;

class KafkaConsumer extends Command
{
    private array $handlers = [
        'user_type'     => UserTypeHandler::class,
        'user'          => UserHandler::class,
        'nc_status'     => NcStatusHandler::class,
        'nc_type'       => NcTypeHandler::class,
        'nonconformity' => NonconformityHandler::class
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
        $consumer->consume(500 * 10000, [$this->handlers[$topic]]);
    }
}