<?php

namespace App\Command;

use App\Contract\Messenger\Command\MessengerCommandBusInterface;
use App\Contract\Messenger\Command\MessengerCommandInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class MessengerCommandBus implements MessengerCommandBusInterface
{
    public function __construct(private readonly MessageBusInterface $commandBus)
    {
    }

    public function dispatch(MessengerCommandInterface $command): void
    {
        $this->commandBus->dispatch($command);
    }
}
