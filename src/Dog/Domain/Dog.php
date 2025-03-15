<?php

namespace App\Dog\Domain;

use Symfony\Component\Uid\Ulid;
use Doctrine\ORM\Mapping as ORM;

class Dog
{
    private Ulid $id;
    private string $name;
    private bool $isNeutered = false;

    private function __construct(Ulid $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
        $this->isNeutered = false;
    }

    public static function create(Ulid $id, string $name): self
    {
        return new self($id, $name);
    }

    public function barkAtCat(Ulid $catId): DogBarkedAtCatEvent
    {
        return new DogBarkedAtCatEvent($this->id, $catId);
    }

    public function neuter(): void
    {
        if ($this->isNeutered) {
            throw new \RuntimeException('Dog is already neutered.');
        }
        $this->isNeutered = true;
    }

    public function id(): Ulid
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function isNeutered(): bool
    {
        return $this->isNeutered;
    }
}
