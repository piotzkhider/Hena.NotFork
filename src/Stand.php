<?php

declare(strict_types=1);

namespace Ysato\NotFork;

class Stand
{
    /**
     * @var StandStrategyInterface
     */
    private $strategy;

    public function __construct(StandStrategyInterface $strategy)
    {
        $this->strategy = $strategy;
    }

    /**
     * @param CheckoutCounter[] $counters
     */
    public function __invoke(array $counters, StanderInterface $stander): CheckoutCounter
    {
        return $this->strategy->__invoke($counters, $stander);
    }
}
