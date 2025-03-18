<?php

namespace App\Dog\Application\Listener;

use App\Dog\Application\IntegrationEvent\DogBarkedAtCatIntegrationEvent;
use App\Dog\Domain\Event\DogBarkedAtCatEvent;
use App\Shared\Application\Service\IntegrationEventBus;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class DogBarkedAtCatListener
{
    public function __construct(
        private IntegrationEventBus $integrationEventBus,
    ) {
    }

    public function __invoke(DogBarkedAtCatEvent $event): void
    {
        $this->integrationEventBus->publish(
            new DogBarkedAtCatIntegrationEvent(
                dogId: $event->dogId,
                catId: $event->catId,
            ),
        );
    }
}