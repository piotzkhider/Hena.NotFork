<?php

declare(strict_types=1);

namespace Ysato\NotFork;

use PHPUnit\Framework\TestCase;

class NotForkTest extends TestCase
{
    /**
     * @var NotFork
     */
    private $SUT;

    protected function setUp(): void
    {
        $this->SUT = new NotFork();
    }

    public function testIsInstanceOfNotFork(): void
    {
        $actual = $this->SUT;
        $this->assertInstanceOf(NotFork::class, $actual);
    }
}
