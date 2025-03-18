<?php

namespace App\Cat\Application\Dto;

use Symfony\Component\Uid\Ulid;

readonly class CatDto
{
    public function __construct(
        public Ulid $id,
        public string $name,
        public bool $isRunning,
    ) {
    }
}