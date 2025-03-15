<?php

namespace App\Dog\Domain;

use Symfony\Component\Uid\Ulid;

class DogBarkedAtCatEvent
{
    public function __construct(
        public Ulid $dogId,
        public Ulid $catId
    ) {}
}