<?php

namespace App\Dog\Domain;

use App\Dog\Domain\Event\DogBarkedAtCatEvent;
use App\Dog\Domain\Event\DogCreated;
use App\Shared\Domain\AggregateRoot;
use Symfony\Component\Uid\Ulid;

class Dog extends AggregateRoot
{
    private function __construct(private Ulid $id, private string $name)
    {
    }

    public static function create(Ulid $id, string $name): self
    {
        $dog = new self($id, $name);
        $dog->raiseDomainEvent(new DogCreated($dog->id, $dog->name));
        return $dog;
    }

    public function barkAtCat(Ulid $catId): void
    {
        $this->raiseDomainEvent(new DogBarkedAtCatEvent($this->id, $catId));
    }

    public function id(): Ulid
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }
}
