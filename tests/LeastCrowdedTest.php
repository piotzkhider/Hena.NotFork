<?php

declare(strict_types=1);

namespace Ysato\NotFork;

use PHPUnit\Framework\TestCase;
use Ysato\NotFork\Customer\Customer;
use Ysato\NotFork\Exception\LogicException;
use Ysato\NotFork\StandStrategy\LeastCrowded;

class LeastCrowdedTest extends TestCase
{
    public function test_invoke(): void
    {
        $SUT = new LeastCrowded();

        $result = $SUT([new CheckoutCounter(1, 1)], new Customer());

        $this->assertSame(1, $result->numberOfCustomers());
    }

    public function test_invoke_counters_is_empty(): void
    {
        $SUT = new LeastCrowded();

        $this->expectException(LogicException::class);

        $SUT([], new Customer());
    }
}
