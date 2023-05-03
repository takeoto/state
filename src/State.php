<?php

declare(strict_types=1);

namespace Takeoto\State;

use Takeoto\Message\Contract\ErrorMessageInterface;
use Takeoto\Message\Contract\MessageInterface;
use Takeoto\State\Contract\StateInterface;

class State implements StateInterface
{
    private bool $status;
    private array $messages;

    /**
     * @param bool|null $status
     * @param MessageInterface[] $messages
     */
    public function __construct(array $messages = [], bool $status = null)
    {
        $this->status = $status ?? $this->hasErrorMessage($messages);
        $this->messages = $messages;
    }

    /**
     * @inheritDoc
     */
    public function isOk(): bool
    {
        return $this->status;
    }

    /**
     * @inheritDoc
     */
    public function getMessages(): array
    {
        return $this->messages;
    }

    /**
     * @param MessageInterface[] $messages
     * @return bool
     */
    private function hasErrorMessage(array $messages): bool
    {
        foreach ($messages as $message) {
            if ($message instanceof ErrorMessageInterface) {
                return true;
            }
        }

        return false;
    }
}