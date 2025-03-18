<?php

namespace App\Dog\Application\IntegrationEvent;

use Symfony\Component\Uid\Ulid;

class DogBarkedAtCatIntegrationEvent
{
    public function __construct(
        public Ulid $dogId,
        public Ulid $catId,
    ) {
    }
}