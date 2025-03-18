<?php

declare(strict_types=1);

namespace App\Shared\Application\Service;

use App\Shared\Domain\IntegrationEvent;

interface IntegrationEventBus
{
    /**
     * @param IntegrationEvent|iterable<IntegrationEvent> $events
     */
    public function publish(object|iterable $events): void;
}
