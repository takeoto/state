<?php

declare(strict_types=1);

namespace Takeoto\State\Contract;

use Takeoto\Message\Contract\MessageInterface;

interface StateInterface
{
    /**
     * Returns status.
     *
     * @return bool
     */
    public function isOk(): bool;

    /**
     * Gets state messages.
     *
     * @return MessageInterface[]
     */
    public function getMessages(): array;
}