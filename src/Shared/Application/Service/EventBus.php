<?php

declare(strict_types=1);

namespace App\Shared\Application\Service;

use App\Shared\Domain\DomainEvent;

interface EventBus
{
    /**
     * @param DomainEvent|iterable<DomainEvent> $events
     */
    public function publish(object|iterable $events): void;
}
