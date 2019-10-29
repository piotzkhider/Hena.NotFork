<?php

declare(strict_types=1);

namespace Ysato\NotFork;

class Customer implements BehandledInterface
{
    /**
     * @var float
     */
    private $amount;

    public function __construct(float $amount)
    {
        $this->amount = $amount;
    }

    public function behandled(): void
    {
        $this->amount--;
    }

    public function isHandled(): bool
    {
        return $this->amount <= 0;
    }
}
