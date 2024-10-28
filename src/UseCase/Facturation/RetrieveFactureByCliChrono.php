<?php

namespace App\UseCase\Facturation;

use App\Contract\UseCase\UseCaseInterface;
use App\Contract\ApiResource\ApiResourceRequestInterface;
use App\Contract\ApiResource\ApiResourceResponseInterface;
use App\Contract\Handler\HandlerInterface;
use App\Query\Facturation\RetrieveFactureByCliChrono as RetrieveFactureByCliChronoQuery;

class RetrieveFactureByCliChrono implements UseCaseInterface {
    public function __construct(
        private readonly MessengerQueryBusInterface $messengerQueryBus,
    ) {}

    public function process(ApiResourceRequestInterface $input, HandlerInterface $providerHandler): ?ApiResourceResponseInterface {
        return $this->messengerQueryBus->dispatch(new RetrieveFactureByCliChronoQuery($input, $providerHandler));
    }
}