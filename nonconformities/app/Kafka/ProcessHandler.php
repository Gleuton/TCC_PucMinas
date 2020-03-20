<?php

namespace App\Kafka;

use PHPEasykafka\KafkaConsumerHandlerInterface;
use RdKafka\KafkaConsumer;
use RdKafka\Message;

class ProcessHandler implements KafkaConsumerHandlerInterface
{
    public function __invoke(
        Message $message,
        KafkaConsumer $consumer
    ) {
        echo $message->payload;
    }
}
