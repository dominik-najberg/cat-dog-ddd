<?php

namespace App\Dog\Application\Repository;

use App\Dog\Domain\Dog;
use Symfony\Component\Uid\Ulid;

interface DogRepository
{
    public function getById(Ulid $dogId): Dog;
    public function save(Dog $dog): void;
}