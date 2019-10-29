<?php

declare(strict_types=1);

namespace Ysato\NotFork;

use PHPUnit\Framework\TestCase;

class StandTest extends TestCase
{
    public function test_invoke(): void
    {
        $strategy = $this->createMock(StandStrategyInterface::class);
        $strategy
            ->method('__invoke')
            ->willReturn($counter = new CheckoutCounter(1, 1));

        $SUT = new Stand($strategy);

        $result = $SUT->__invoke([$counter], new Customer(1));

        $this->assertSame($counter, $result);
    }
}
