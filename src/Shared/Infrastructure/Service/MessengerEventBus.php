<?php

namespace App\Shared\Infrastructure\Service;

use App\Shared\Application\Service\EventBus;
use App\Shared\Domain\DomainEvent;
use Symfony\Component\Messenger\MessageBusInterface;

class MessengerEventBus implements EventBus
{
    private MessageBusInterface $eventBus;

    public function __construct(MessageBusInterface $eventBus)
    {
        $this->eventBus = $eventBus;
    }

    public function publish(object|iterable $events): void
    {
        if (!is_iterable($events)) {
            $events = [$events];
        }

        foreach ($events as $event) {
            if (!$event instanceof DomainEvent) {
                throw new \InvalidArgumentException('Event must be an instance of DomainEvent');
            }

            $this->eventBus->dispatch($event);
        }
    }
}
