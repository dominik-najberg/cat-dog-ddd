<?php

namespace App\Dog\Domain\Event;

use App\Shared\Domain\DomainEvent;
use Symfony\Component\Uid\Ulid;

class DogCreated implements DomainEvent
{
    public function __construct(
        public Ulid $id,
        public string $name,
    ){
    }

    public function getAggregateRootId(): Ulid
    {
        return $this->id;
    }
}