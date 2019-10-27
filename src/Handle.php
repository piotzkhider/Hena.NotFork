<?php

declare(strict_types=1);

namespace Ysato\NotFork;

class Handle
{
    /**
     * @param CheckoutCounter[] $checkoutCounters
     *
     * @return void
     */
    public function __invoke(array $checkoutCounters): void
    {
        foreach ($checkoutCounters as $checkoutCounter) {
            $checkoutCounter->handle();
        }
    }
}
