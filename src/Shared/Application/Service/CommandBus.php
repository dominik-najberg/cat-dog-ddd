<?php

declare(strict_types=1);

namespace App\Shared\Application\Service;

use Symfony\Component\Messenger\Envelope;

interface CommandBus
{
    public function dispatch(object $command): Envelope;
}
