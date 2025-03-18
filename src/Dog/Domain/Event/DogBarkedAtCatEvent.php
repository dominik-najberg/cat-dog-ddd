<?php

namespace App\Dog\Domain\Event;

use App\Shared\Domain\DomainEvent;
use Symfony\Component\Uid\Ulid;

class DogBarkedAtCatEvent implements DomainEvent
{
    public function __construct(
        public Ulid $dogId,
        public Ulid $catId
    ) {}

    public function getAggregateRootId(): Ulid
    {
        return $this->dogId;
    }
}