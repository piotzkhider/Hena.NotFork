<?php

declare(strict_types=1);

namespace Ysato\NotFork;

use PHPUnit\Framework\TestCase;
use Ysato\NotFork\Customer\Customer;

class StandTest extends TestCase
{
    public function test_invoke()
    {
        $strategy = $this->createMock(StandStrategyInterface::class);
        $strategy
            ->method('__invoke')
            ->willReturn($counter = new CheckoutCounter(1, 1));

        $SUT = new Stand($strategy);

        $result = $SUT->__invoke([$counter], new Customer());

        $this->assertSame($counter, $result);
    }
}
