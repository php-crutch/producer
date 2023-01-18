<?php

declare(strict_types=1);

namespace Crutch\Producer;

interface Producer
{
    public function produce(string $message, string $topic, float $delay = 0): void;
}
