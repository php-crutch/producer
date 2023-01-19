# crutch/producer

Note that this is not a Producer implementation of its own. It is merely abstractions that describe the components of a Producer.

The installable [package](https://packagist.org/packages/crutch/producer) and [implementations](https://packagist.org/providers/crutch/producer-implementation) are listed on Packagist.


# Install

```bash
composer require crutch/producer
```

You may use `\Crutch\Producer\Producers\RouteProducer` for split producers by topic

```php
<?php

/** @var Crutch\Producer\Producer $defaultProducer */
/** @var Crutch\Producer\Producer $topicOneProducer */
/** @var Crutch\Producer\Producer $topicTwoProducer */

$producer = new Crutch\Producer\Producers\RouteProducer($defaultProducer);
$producer->setProducer('one', $topicOneProducer);
$producer->setProducer('two', $topicTwoProducer);

$producer->produce('message 1', 'one'); // produced by $topicOneProducer
$producer->produce('message 2', 'two'); // produced by $topicTwoProducer
$producer->produce('message 3', 'three'); // produced by $defaultProducer
```
