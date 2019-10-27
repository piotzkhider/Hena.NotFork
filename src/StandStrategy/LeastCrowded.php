<?php

declare(strict_types=1);

namespace Ysato\NotFork\StandStrategy;

use Ysato\NotFork\CheckoutCounter;
use Ysato\NotFork\CustomerInterface;
use Ysato\NotFork\Exception\LogicException;
use Ysato\NotFork\StandStrategyInterface;

class LeastCrowded implements StandStrategyInterface
{
    /**
     * @param CheckoutCounter[] $counters
     * @param CustomerInterface ...$customers
     */
    public function __invoke(array $counters, CustomerInterface ...$customers): CheckoutCounter
    {
        $counter = $this->getLeastCrowded($counters);

        foreach ($customers as $customer) {
            $counter->enqueue($customer);
        }

        return $counter;
    }

    /**
     * @param CheckoutCounter[] $counters
     */
    private function getLeastCrowded(array $counters): CheckoutCounter
    {
        if (empty($counters)) {
            throw new LogicException();
        }

        usort($counters, function (CheckoutCounter $a, CheckoutCounter $b) {
            return $a->getId() <=> $b->getId();
        });

        return array_reduce($counters, function (CheckoutCounter $carry, CheckoutCounter $item) {
            return $carry->numberOfCustomers() > $item->numberOfCustomers() ? $item : $carry;
        }, $counters[0]);
    }
}
