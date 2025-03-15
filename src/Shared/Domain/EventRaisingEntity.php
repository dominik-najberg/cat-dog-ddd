<?php

/**
 * @copyright © UAB NFQ Technologies
 *
 * This Software is the property of NFQ Technologies
 * and is protected by copyright law – it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license key
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * Contact UAB NFQ Technologies:
 * E-mail: info@nfq.lt
 * https://www.nfq.lt
 */

declare(strict_types=1);

namespace App\Shared\Domain;

use InvalidArgumentException;

abstract class EventRaisingEntity
{
    /**
     * @var array<DomainEvent>
     */
    private array $domainEvents = [];

    private ?EventRaisingEntity $parentEntity = null;

    /**
     * @return array<DomainEvent>
     */
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

    /**
     * Set parent entity that should receive domain events raised by this entity.
     */
    public function setParentEntity(self $entity): void
    {
        if ($this === $entity) {
            throw new InvalidArgumentException('Cannot set parent entity to itself');
        }

        $this->parentEntity = $entity;
    }

    /**
     * Raise domain event. If parent entity is set, pass event to it instead of storing it locally.
     */
    protected function raiseDomainEvent(DomainEvent $event): void
    {
        // pass domain event to parent instead of storing it locally
        if ($this->parentEntity !== null) {
            $this->parentEntity->raiseDomainEvent($event);

            return;
        }

        $this->domainEvents[] = $event;
    }
}
