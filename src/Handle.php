<?php

declare(strict_types=1);

namespace Ysato\NotFork;

class Handle
{
    /**
     * @param CheckoutCounter[] $checkoutCounters
     */
    public function __invoke(array $checkoutCounters): void
    {
        foreach ($checkoutCounters as $checkoutCounter) {
            $checkoutCounter->handle();
        }
    }
}
