<?php

declare(strict_types=1);

namespace Ysato\NotFork;

use SplQueue;
use Ysato\NotFork\Customer\AnnoyingCustomer;

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

            if ($this->customers->bottom() instanceof AnnoyingCustomer) {
                return;
            }

            $this->customers->dequeue();
        }
    }

    public function enqueue(CustomerInterface $customer): void
    {
        $this->customers->enqueue($customer);
    }

    public function numberOfCustomers(): int
    {
        return $this->customers->count();
    }

    public function getId(): int
    {
        return $this->id;
    }
}
