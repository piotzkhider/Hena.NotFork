<?php

declare(strict_types=1);

namespace Ysato\NotFork;

class StanderFactory
{
    public static function make(string $command): StanderInterface
    {
        if ($command === 'x') {
            return new Customer(INF);
        }

        if ($command === '1') {
            return new Customer(1);
        }

        $customers = new CrowdOfCustomer();
        for ($i = 0; $i < (int) $command; $i++) {
            $customers->enqueue(new Customer(1));
        }

        return $customers;
    }
}
