<?php declare(strict_types=1);

namespace Mammatus\Tests\LifeCycleEvents\Promise;

use Mammatus\LifeCycleEvents\Promise\Shutdown as ShutdownPromise;
use Mammatus\LifeCycleEvents\Shutdown as ShutdownEvent;
use React\Promise\PromiseInterface;

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
