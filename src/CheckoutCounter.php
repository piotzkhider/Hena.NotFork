<?php

declare(strict_types=1);

namespace Ysato\NotFork;

use SplQueue;

class CheckoutCounter
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $capacity;

    /**
     * @var SplQueue
     */
    private $customers;

    public function __construct(int $id, int $capacity)
    {
        $this->id = $id;
        $this->capacity = $capacity;
        $this->customers = new SplQueue();
    }

    public function handle(): void
    {
        for ($i = 0; $i < $this->capacity; $i++) {
            if ($this->customers->isEmpty()) {
                return;
            }

            /** @var BehandledInterface $customer */
            $customer = $this->customers->bottom();
            $customer->behandled();

            if (! $customer->isHandled()) {
                continue;
            }

            $this->customers->dequeue();
        }
    }

    public function enqueue(StanderInterface $stander): void
    {
        $this->customers->enqueue($stander);
    }

    public function numberOfCustomers(): int
    {
        $sum = 0;
        /** @var StanderInterface $stander */
        foreach ($this->customers as $stander) {
            $sum += $stander->numberOfStanders();
        }

        return $sum;
    }

    public function getId(): int
    {
        return $this->id;
    }
}
