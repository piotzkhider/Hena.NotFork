<?php

declare(strict_types=1);

namespace Ysato\NotFork;

interface StandStrategyInterface
{
    /**
     * @param CheckoutCounter[] $counters
     * @param Customer          ...$customers
     */
    public function __invoke(array $counters, Customer ...$customers): CheckoutCounter;
}
