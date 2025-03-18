<?php

namespace App\Dog\Ui\Http;

use App\Dog\Application\Command\BarkAtCatCommand;
use App\Shared\Application\Service\CommandBus;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Uid\Ulid;

readonly class BarkAtCatController
{
    public function __construct(
        private CommandBus $commandBus,
    ) {
    }

    #[Route('/bark/{catId}/{dogId}', name: 'bark_at_cat', methods: ['GET'])]
    public function bark(string $catId, string $dogId): Response
    {
        $catId = Ulid::fromString($catId);
        $dogId = Ulid::fromString($dogId);

        $command = new BarkAtCatCommand($catId, $dogId);
        $this->commandBus->dispatch($command);

        return new Response(null, Response::HTTP_ACCEPTED);
    }
}
