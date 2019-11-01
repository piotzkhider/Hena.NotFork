<?php

declare(strict_types=1);

namespace Ysato\NotFork;

interface StandStrategyInterface
{
    /**
     * @param CheckoutCounter[] $counters
     */
    public function __invoke(array $counters, StanderInterface $stander): CheckoutCounter;
}
