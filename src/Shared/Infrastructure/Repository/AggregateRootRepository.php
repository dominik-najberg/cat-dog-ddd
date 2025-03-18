<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure\Repository;

use App\Shared\Application\Service\EventEmitterTrait;
use App\Shared\Domain\AggregateRoot;

abstract class AggregateRootRepository
{
    use EventEmitterTrait;

    protected function publishAggregateRootEvents(AggregateRoot $aggregateRoot): void
    {
        $this->publish($aggregateRoot->pullDomainEvents());
    }
}
