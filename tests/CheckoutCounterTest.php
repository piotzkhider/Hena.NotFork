<?php

declare(strict_types=1);

namespace Ysato\NotFork;

use PHPUnit\Framework\TestCase;
use Ysato\NotFork\Customer\AnnoyingCustomer;
use Ysato\NotFork\Customer\Customer;

class CheckoutCounterTest extends TestCase
{
    public function test_add(): void
    {
        $SUT = new CheckoutCounter(1, 1);
        $SUT->enqueue(new Customer());
        $SUT->enqueue(new Customer());
        $SUT->enqueue(new Customer());

        $this->assertSame(3, $SUT->numberOfCustomers());
    }

    public function test_id(): void
    {
        $SUT = new CheckoutCounter(1, 1);

        $this->assertSame(1, $SUT->getId());
    }

    public function test_handle(): void
    {
        $SUT = new CheckoutCounter(1, 2);
        $SUT->enqueue(new Customer());
        $SUT->enqueue(new Customer());
        $SUT->enqueue(new Customer());

        $SUT->handle();

        $this->assertSame(1, $SUT->numberOfCustomers());
    }

    public function test_handle_annoying_customer(): void
    {
        $SUT = new CheckoutCounter(1, 2);
        $SUT->enqueue(new Customer());
        $SUT->enqueue(new AnnoyingCustomer());
        $SUT->enqueue(new Customer());

        $SUT->handle();

        $this->assertSame(2, $SUT->numberOfCustomers());
    }

    public function test_handle_customers_is_empty(): void
    {
        $SUT = new CheckoutCounter(1, 2);

        $SUT->handle();

        $this->assertSame(0, $SUT->numberOfCustomers());
    }
}
