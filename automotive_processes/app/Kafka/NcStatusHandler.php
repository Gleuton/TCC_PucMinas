<?php

namespace App\Kafka;

use App\Services\NcStatusService;
use PHPEasykafka\KafkaConsumerHandlerInterface;
use RdKafka\Exception;
use RdKafka\KafkaConsumer;
use RdKafka\Message;

class NcStatusHandler implements KafkaConsumerHandlerInterface
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
        $processService = new NcStatusService($payload);
        $processService->save();
        $consumer->commit();
    }
}
