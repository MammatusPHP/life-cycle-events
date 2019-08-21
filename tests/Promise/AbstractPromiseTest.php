<?php declare(strict_types=1);

namespace ReactiveApps\Tests\LifeCycleEvents\Promise;

use PHPUnit\Framework\TestCase;
use Psr\EventDispatcher\ListenerProviderInterface;
use React\Promise\PromiseInterface;
use WyriHaximus\Broadcast\Dispatcher;

/**
 * @internal
 */
abstract class AbstractPromiseTest extends TestCase
{
    /**
     * @test
     */
    public function promise(): void
    {
        $one = false;
        $two = false;

        $shutdownPromise = $this->getPromise();

        $dispatcher = new Dispatcher(new class($shutdownPromise) implements ListenerProviderInterface {
            private $shutdownPromise;

            public function __construct($shutdownPromise)
            {
                $this->shutdownPromise = $shutdownPromise;
            }

            public function getListenersForEvent(object $event): iterable
            {
                yield $this->shutdownPromise;
            }
        });

        $shutdownPromise->then(function () use (&$one): void {
            $one = true;
        });

        self::assertFalse($one);
        self::assertFalse($two);

        $dispatcher->dispatch($this->getEvent());

        self::assertTrue($one);
        self::assertFalse($two);

        $shutdownPromise->then(function () use (&$two): void {
            $two = true;
        });

        self::assertTrue($one);
        self::assertTrue($two);
    }

    abstract protected function getPromise(): PromiseInterface;

    abstract protected function getEvent(): object;
}
