<?php

declare(strict_types=1);

namespace Crutch\Producer\Producers;

use InvalidArgumentException;
use Crutch\Producer\Producer;

final class RouteProducer implements Producer
{
    /** @var array<string, Producer> */
    private array $producers = [];

    public function __construct(Producer $defaultProducer)
    {
        $this->producers[''] = $defaultProducer;
    }

    public function setProducer(string $topic, Producer $producer): void
    {
        $topic = $this->checkTopic($topic);
        $this->producers[$topic] = $producer;
    }

    public function produce(string $message, string $topic, float $delay = 0): void
    {
        $producer = $this->getProducer($topic);
        $producer->produce($message, $topic, $delay);
    }

    private function getProducer(string $topic): Producer
    {
        $topic = $this->checkTopic($topic);
        if (!array_key_exists($topic, $this->producers)) {
            return $this->producers[''];
        }
        return $this->producers[$topic];
    }

    private function checkTopic(string $topic): string
    {
        $topic = trim($topic);
        if ($topic === '') {
            throw new InvalidArgumentException('topic can not be empty');
        }
        return $topic;
    }
}
