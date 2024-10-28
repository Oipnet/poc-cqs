<?php

namespace App\Contract\Messenger\Command;

interface MessengerCommandBusInterface
{
    public function dispatch(MessengerCommandInterface $command): void;
}
