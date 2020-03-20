<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use PHPEasykafka\Broker;
use PHPEasykafka\BrokerCollection;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(
            'KafkaBrokerCollection',
            static function () {
                $boker = new Broker('kafka', '9092');
                $kafkaBrokerCollection = new BrokerCollection();
                $kafkaBrokerCollection->addBroker($boker);
                return $kafkaBrokerCollection;
            }
        );

        $this->app->bind(
            'kafkaTopicConfig',
            static function () {
                return [
                    'topic'    => [
                        'auto.offset.reset' => 'largest'
                    ],
                    'consumer' => [
                        'enable.auto.commit'       => 'false',
                        'auto.commit.interval.ms'  => '100',
                        'enable.auto.offset.store' => 'true'
                    ]
                ];
            }
        );
    }

    public function boot(): void
    {
    }
}
