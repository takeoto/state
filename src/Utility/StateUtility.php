<?php

declare(strict_types=1);

namespace Takeoto\State\Utility;

use Takeoto\Message\Contract\ErrorMessageInterface;
use Takeoto\State\Contract\StateInterface;

final class StateUtility
{
    /**
     * @param StateInterface $state
     * @param \Closure(?ErrorMessageInterface $firstError, StateInterface $state):\Throwable|null $exceptionBuilder
     * @return void
     * @throws \Throwable
     */
    public static function ensure(StateInterface $state, \Closure $exceptionBuilder = null): void
    {
        if ($state->isOk()) {
            return;
        }

        $exceptionBuilder ??= static fn(?ErrorMessageInterface $firstError): \Throwable => new \RuntimeException(
            null === $firstError ? 'Runtime error.' : $firstError->__toString() ,
            null === $firstError ? 0 : $firstError->getCode(),
        );
        throw $exceptionBuilder($state->getMessages()->getErrors()->first(), $state);
    }
}