<?php

declare(strict_types=1);

namespace Mammatus\Tests\LifeCycleEvents\Promise;

use Mammatus\LifeCycleEvents\Initialize as InitializeEvent;
use Mammatus\LifeCycleEvents\Promise\Initialize as InitializePromise;
use React\Promise\PromiseInterface;

/**
 * @internal
 */
final class InitializeTest extends AbstractPromiseTest
{
    public function getPromise(): PromiseInterface
    {
        return new InitializePromise();
    }

    public function getEvent(): object
    {
        return new InitializeEvent();
    }
}
