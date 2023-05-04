<?php

declare(strict_types=1);

namespace Takeoto\State\Contract;

use Takeoto\Message\Contract\MessageInterface;
use Takeoto\Message\Contract\MessagesCollectionInterface;

interface StateInterface
{
    /**
     * Returns status.
     *
     * @return bool
     */
    public function isOk(): bool;

    /**
     * Gets state description messages.
     *
     * @return MessagesCollectionInterface<string|int,MessageInterface>
     */
    public function getMessages(): MessagesCollectionInterface;
}