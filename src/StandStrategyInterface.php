<?php

declare(strict_types=1);

namespace Ysato\NotFork;

interface StandStrategyInterface
{
    /**
     * @param CheckoutCounter[] $counters
     * @param CustomerInterface ...$customers
     *
     * @return CheckoutCounter
     */
    public function __invoke(array $counters, CustomerInterface ...$customers): CheckoutCounter;
}
