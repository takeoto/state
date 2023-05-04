<?php

declare(strict_types=1);

namespace Takeoto\State;

use Takeoto\Message\Contract\MessageInterface;
use Takeoto\Message\Contract\MessagesCollectionInterface;
use Takeoto\Message\MessagesCollection;
use Takeoto\State\Contract\StateInterface;

class State implements StateInterface
{
    private ?bool $status;
    private MessagesCollectionInterface $messages;

    /**
     * @param bool|null $status
     * @param MessageInterface[] $messages
     */
    public function __construct(array $messages = [], bool $status = null)
    {
        $this->messages = new MessagesCollection($messages);
        $this->status = $status;
    }

    /**
     * @inheritDoc
     */
    public function isOk(): bool
    {
        return $this->status ??= $this->getMessages()->getErrors()->count() === 0;
    }

    /**
     * @inheritDoc
     */
    public function getMessages(): MessagesCollectionInterface
    {
        return $this->messages;
    }
}