<?php

namespace App\Cat\Domain;

use App\Shared\Domain\AggregateRoot;
use Symfony\Component\Uid\Ulid;

class Cat extends AggregateRoot
{
    private Ulid $id;
    private string $name;
    private bool $isRunning = false;

    public function __construct(Ulid $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public static function create(Ulid $id, string $name): self
    {
        return new self($id, $name);
    }

    public function run(): void
    {
        // Any logic we need
        $this->isRunning = true;
    }

    public function isRunning(): bool
    {
        return $this->isRunning;
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
