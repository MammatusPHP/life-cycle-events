<?php declare(strict_types=1);

namespace ReactiveApps\Tests\LifeCycleEvents\Promise;

use React\Promise\PromiseInterface;
use ReactiveApps\LifeCycleEvents\PreBoot as PreBootEvent;
use ReactiveApps\LifeCycleEvents\Promise\PreBoot as PreBootPromise;

/**
 * @internal
 */
final class PreBootTest extends AbstractPromiseTest
{
    public function getPromise(): PromiseInterface
    {
        return new PreBootPromise();
    }

    public function getEvent(): object
    {
        return new PreBootEvent();
    }
}
