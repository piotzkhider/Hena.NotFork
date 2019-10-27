<?php

declare(strict_types=1);

namespace Ysato\NotFork;

use Ysato\NotFork\Customer\AnnoyingCustomer;
use Ysato\NotFork\Customer\Customer;
use Ysato\NotFork\StandStrategy\LeastCrowded;

class NotFork
{
    public function main(string $input)
    {
        $checkoutCounters = [
            new CheckoutCounter(1, 2),
            new CheckoutCounter(2, 7),
            new CheckoutCounter(3, 3),
            new CheckoutCounter(4, 5),
            new CheckoutCounter(5, 2),
        ];

        $handle = new Handle();
        $stand = new Stand(new LeastCrowded());

        $commands = str_split($input);
        foreach ($commands as $command) {
            switch ($command) {
                case '.':
                    $handle($checkoutCounters);
                    break;
                case 'x':
                    $stand($checkoutCounters, new AnnoyingCustomer());
                    break;
                default:
                    $customers = [];
                    for ($i = 0; $i < (int) $command; $i++) {
                        $customers[] = new Customer();
                    }

                    $stand($checkoutCounters, ...$customers);
                    break;
            }
        }

        usort($checkoutCounters, function (CheckoutCounter $a, CheckoutCounter $b) {
            return $a->getId() <=> $b->getId();
        });

        $numberOfCustomers = array_map(function (CheckoutCounter $counter) {
            return $counter->numberOfCustomers();
        }, $checkoutCounters);

        return implode(',', $numberOfCustomers);
    }
}
