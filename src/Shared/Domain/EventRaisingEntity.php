<?php

declare(strict_types=1);

namespace App\Shared\Domain;

abstract class EventRaisingEntity
{
    /** @var array<DomainEvent> */
    private array $domainEvents = [];

    /** @return array<DomainEvent> */
    public function pullDomainEvents(): array
    {
        $domainEvents = $this->domainEvents;
        $this->domainEvents = [];

        return $domainEvents;
    }

    /**
     * @return array<DomainEvent>
     */
    public function peekDomainEvents(): array
    {
        return $this->domainEvents;
    }

    protected function raiseDomainEvent(DomainEvent $event): void
    {
        $this->domainEvents[] = $event;
    }
}
