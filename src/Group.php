<?php

declare(strict_types=1);

namespace Mammatus\LifeCycleEvents;

final readonly class Group
{
    public const string NO_GROUP = "no-group";
    public function __construct(
        public string $group = self::NO_GROUP,
    ) {

    }
}
