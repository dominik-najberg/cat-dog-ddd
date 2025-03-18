<?php

namespace App\Cat\Application\Listener;

use App\Cat\Application\Repository\CatRepository;
use App\Cat\Domain\Cat;
use App\Dog\Application\IntegrationEvent\DogBarkedAtCatIntegrationEvent;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
readonly class DogBarkedAtCatIntegrationEventListener
{
    public function __construct(
        private CatRepository $catRepository,
    ) {
    }

    public function __invoke(DogBarkedAtCatIntegrationEvent $integrationEvent): void
    {
        $this->catRepository->getByIdAnd(
            id: $integrationEvent->catId,
            callback: fn(Cat $cat) => $cat->run(),
        );

        // dispatch CatRanFromDogEvent
    }
}
