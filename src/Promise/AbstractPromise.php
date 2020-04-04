<?php declare(strict_types=1);

namespace Mammatus\LifeCycleEvents\Promise;

use React\Promise\PromiseInterface;
use function is_callable;
use function React\Promise\resolve;
use const WyriHaximus\Constants\Boolean\FALSE_;
use const WyriHaximus\Constants\Boolean\TRUE_;

abstract class AbstractPromise implements PromiseInterface
{
    private bool $fulfilled = FALSE_;

    /** @var callable[]  */
    private array $onFulfillQueue = [];

    final public function __invoke(): void
    {
        $this->fulfilled = TRUE_;

        foreach ($this->onFulfillQueue as $onFulfilled) {
            $onFulfilled(TRUE_);
        }
    }

    final public function then(?callable $onFulfilled = null, ?callable $onRejected = null, ?callable $onProgress = null): PromiseInterface
    {
        if ($this->fulfilled === FALSE_ && $onFulfilled !== null) {
            $this->onFulfillQueue[] = $onFulfilled;

            return resolve();
        }

        if ($this->fulfilled === FALSE_) {
            return resolve();
        }

        if (is_callable($onFulfilled)) {
            $onFulfilled(TRUE_);
        }

        return resolve();
    }
}
