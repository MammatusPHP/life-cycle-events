<?php declare(strict_types=1);

namespace Mammatus\Tests\LifeCycleEvents\Promise;

use Mammatus\LifeCycleEvents\PreBoot as PreBootEvent;
use Mammatus\LifeCycleEvents\Promise\PreBoot as PreBootPromise;
use React\Promise\PromiseInterface;

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
