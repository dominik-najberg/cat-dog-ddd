<?php

declare(strict_types=1);

namespace App\Shared\Application\Service;

use App\Shared\Domain\DomainEvent;
use RuntimeException;
use Symfony\Contracts\Service\Attribute\Required;

trait EventEmitterTrait
{
    private ?EventBus $eventBus = null;

    #[Required]
    public function setEventBus(EventBus $eventBus): void
    {
        $this->eventBus = $eventBus;
    }

    protected function publish(iterable|DomainEvent $event): void
    {
        $this->eventBus ?? throw new RuntimeException('EventBus not set.');
        $this->eventBus->publish($event);
    }
}
