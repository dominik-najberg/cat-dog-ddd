<?php

namespace App\Dog\Application\Command;

use Symfony\Component\Uid\Ulid;

class BarkAtCatCommand
{
    public function __construct(
        public Ulid $dogId,
        public Ulid $catId,
    ) {
    }
}