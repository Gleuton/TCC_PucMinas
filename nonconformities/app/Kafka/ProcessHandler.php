<?php

namespace App\Kafka;

use App\Models\Process;
use PHPEasykafka\KafkaConsumerHandlerInterface;
use RdKafka\Exception;
use RdKafka\KafkaConsumer;
use RdKafka\Message;

class ProcessHandler implements KafkaConsumerHandlerInterface
{
    /**
     * @param Message       $message
     * @param KafkaConsumer $consumer
     *
     * @throws Exception
     */
    public function __invoke(
        Message $message,
        KafkaConsumer $consumer
    ) {
        $payload = json_decode(
            $message->payload,
            true,
            512,
            JSON_THROW_ON_ERROR
        );
        $orderService = new Process($payload);
        $orderService->save();
        $consumer->commit();
    }
}
