<?php declare(strict_types=1);

namespace ReactiveApps\Tests\LifeCycleEvents\Promise;

use React\Promise\PromiseInterface;
use ReactiveApps\LifeCycleEvents\Boot as BootEvent;
use ReactiveApps\LifeCycleEvents\Promise\Boot as BootPromise;

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
