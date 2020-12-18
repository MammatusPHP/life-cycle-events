<?php

declare(strict_types=1);

namespace Mammatus\Tests\LifeCycleEvents\Promise;

use Mammatus\LifeCycleEvents\Boot as BootEvent;
use Mammatus\LifeCycleEvents\Promise\Boot as BootPromise;
use React\Promise\PromiseInterface;

/**
 * @internal
 */
final class BootTest extends AbstractPromiseTest
{
    public function getPromise(): PromiseInterface
    {
        return new BootPromise();
    }

    public function getEvent(): object
    {
        return new BootEvent();
    }
}
