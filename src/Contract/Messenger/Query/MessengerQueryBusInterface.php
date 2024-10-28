<?php

namespace App\Contract\Messenger\Query;

interface MessengerQueryBusInterface
{
    public function dispatch(MessengerQueryInterface $query): void;
}
