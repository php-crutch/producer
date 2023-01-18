<?php

declare(strict_types=1);

namespace Crutch\Producer\Producers;

use Crutch\Producer\Producer;

final class VoidProducer implements Producer
{
    public function produce(string $message, string $topic, float $delay = 0): void
    {
    }
}
