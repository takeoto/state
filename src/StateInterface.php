<?php

declare(strict_types=1);

namespace Takeoto\State;

use Takeoto\Message\Contract\MessageInterface;

interface StateInterface
{
    public function isOk(): bool;

    /**
     * @return MessageInterface[]
     */
    public function getMessages(): array;
}