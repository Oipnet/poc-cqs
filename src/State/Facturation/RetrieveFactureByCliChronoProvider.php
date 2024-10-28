<?php

namespace App\State\Facturation;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use App\ApiResource\Facturation\RetrieveFactureByCliChronoRequest;
use App\UseCase\Facturation\RetrieveFactureByCliChrono;
use App\Processor\ProviderHandler;
use App\Processor\Configuration;


final class RetrieveFactureByCliChronoProvider implements ProviderInterface {
    public function __construct(
        #[Autowire(service: 'api_platform.doctrine.orm.state.item_provider')]
        private ProviderInterface $decoratedProvider,
        private readonly RetrieveFactureByCliChrono $retrieveFactureByCliChrono,
    ){}
    public function provide(Operation $operation, array $uriVariables = [], array $context = []): object|null {
        $data = new RetrieveFactureByCliChronoRequest($uriVariables['cliChrono'], $uriVariables['id']);

        return $this->retrieveFactureByCliChrono->process($data, new ProviderHandler($this->decoratedProvider, new Configuration($operation, $uriVariables, $context)));
    }
}