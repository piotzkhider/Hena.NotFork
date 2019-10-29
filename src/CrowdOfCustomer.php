<?php

declare(strict_types=1);

namespace Ysato\NotFork;

use SplQueue;

class CrowdOfCustomer implements BehandledInterface, StanderInterface
{
    /**
     * @var SplQueue
     */
    private $customers;

    public function __construct()
    {
        $this->customers = new SplQueue();
    }

    public function enqueue(Customer $customer): void
    {
        $this->customers->enqueue($customer);
    }

    public function behandled(): void
    {
        /** @var Customer $customer */
        $customer = $this->customers->bottom();
        $customer->behandled();

        if (! $customer->isHandled()) {
            return;
        }

        $this->customers->dequeue();
    }

    public function isHandled(): bool
    {
        return $this->customers->isEmpty();
    }

    public function numberOfStanders(): int
    {
        return $this->customers->count();
    }
}
