<?php

namespace App\Shared\Domain;

use Symfony\Component\Uid\Ulid;

interface DomainEvent
{
    public function getAggregateRootId(): Ulid;
}
