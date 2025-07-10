# Life Cycle Events

![Continuous Integration](https://github.com/MammatusPHP/life-cycle-events/workflows/Continuous%20Integration/badge.svg)
[![Latest Stable Version](https://poser.pugx.org/mammatus/life-cycle-events/v/stable.png)](https://packagist.org/packages/mammatus/life-cycle-events)
[![Total Downloads](https://poser.pugx.org/mammatus/life-cycle-events/downloads.png)](https://packagist.org/packages/mammatus/life-cycle-events/stats)
[![Code Coverage](https://scrutinizer-ci.com/g/MammatusPHP/life-cycle-events/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/MammatusPHP/life-cycle-events/?branch=master)
[![Type Coverage](https://shepherd.dev/github/MammatusPHP/life-cycle-events/coverage.svg)](https://shepherd.dev/github/MammatusPHP/life-cycle-events)
[![License](https://poser.pugx.org/mammatus/life-cycle-events/license.png)](https://packagist.org/packages/mammatus/life-cycle-events)

# Installation

To install via [Composer](http://getcomposer.org/), use the command below, it will automatically detect the latest version and bind it with `^`.

```
composer require mammatus/life-cycle-events
```

# Events

## Kernel

Pre-Initialization phase for anything that MUST be set up first like OTEL.

## Initialize

Initialization phase for any blocking operation before the event loop starts.

## Boot/Start

The event loop has just started running and the application is now running. Now the different between the `Boot` and
`Start` event is that the `Boot` event is used for the generic catch all process. While `Start` is used for specific
split out processes.

## Shutdown

Shutdown is emitted when an fatal error occurred or an OS signal is caught an the application is shutting down.

## Listener

The following listener is from one of my apps and listeners both on intialize and shutdown events. The logic has been
taken out, but logging is left intact to demonstracte a simple listener example.

```php
<?php

declare(strict_types=1);

namespace WyriHaximus\Apps\WyriHaximusNet\GitHub\Ingest;

use Mammatus\LifeCycleEvents\Initialize;
use Mammatus\LifeCycleEvents\Shutdown;
use Psr\Log\LoggerInterface;
use WyriHaximus\Broadcast\Contracts\Listener;

final class Consumer implements Listener
{
    private LoggerInterface $logger;

    public function __construct(ConsumerContract $consumer, Producer $producer, LoggerInterface $logger)
    {
        $this->logger   = $logger;
    }

    public function start(Initialize $event): void
    {
        $this->logger->debug('Starting to consume ingested GitHub WebHook events');
    }

    public function stop(Shutdown $event): void
    {
        $this->logger->debug('Stopping to consume ingested GitHub WebHook events');
    }
}
```

# License

The MIT License (MIT)

Copyright (c) 2020 Cees-Jan Kiewiet

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
