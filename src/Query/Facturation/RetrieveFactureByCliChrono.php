<?php

namespace App\Query\Facturation;

final readonly class RetrieveFactureByCliChrono implements MessengerQueryInterface {
    public function __construct(
        private RetreiveFactureByCliChronoRequest $retrieveFactureByCLiChronoRequest,
        private HandlerInterface $providerHandler
    ) {}

    public function getRetrieveFactureByCliChronoRequest(): RetreiveFactureByCliChronoRequest {
        return $this->retrieveFactureByCLiChronoRequest;
    }

    public function getProviderHandler(): HandlerInterface {
        return $this->providerHandler;
    }
}