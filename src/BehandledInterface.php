<?php

declare(strict_types=1);

namespace Ysato\NotFork;

interface BehandledInterface
{
    public function behandled(): void;

    public function isHandled(): bool;
}
