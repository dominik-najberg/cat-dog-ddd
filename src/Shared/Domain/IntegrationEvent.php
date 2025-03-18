<?php

namespace App\Shared\Domain;

use Symfony\Component\Uid\Ulid;

/**
 * Marker interface for domain events.
 */
interface IntegrationEvent
{
    public function getAggregateRootId(): Ulid;
}
