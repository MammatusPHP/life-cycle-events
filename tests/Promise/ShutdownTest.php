<?php declare(strict_types=1);

namespace ReactiveApps\Tests\LifeCycleEvents\Promise;

use React\Promise\PromiseInterface;
use ReactiveApps\LifeCycleEvents\Promise\Shutdown as ShutdownPromise;
use ReactiveApps\LifeCycleEvents\Shutdown as ShutdownEvent;

/**
 * @internal
 */
final class ShutdownTest extends AbstractPromiseTest
{
    public function getPromise(): PromiseInterface
    {
        return new ShutdownPromise();
    }

    public function getEvent(): object
    {
        return new ShutdownEvent();
    }
}
