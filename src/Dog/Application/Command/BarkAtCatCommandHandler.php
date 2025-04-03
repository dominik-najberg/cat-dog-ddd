<?php

namespace App\Dog\Application\Command;

use App\Dog\Application\Repository\DogRepository;
use App\Shared\Application\Service\EventBus;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
readonly class BarkAtCatCommandHandler
{
    public function __construct(
        private DogRepository $dogRepository,
    ) {
    }

    public function __invoke(BarkAtCatCommand $command): void
    {
        $dog = $this->dogRepository->getById($command->dogId);
        $dog->barkAtCat($command->catId);
    }
}