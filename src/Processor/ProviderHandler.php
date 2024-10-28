<?php

namespace App\Processor;

use ApiPlatform\State\ProviderInterface;
use App\Contract\Handler\HandlerInterface;

class ProviderHandler implements HandlerInterface {
    public function __construct(
        private readonly ProviderInterface $processor,
        private readonly Configuration $configuration
    )
    {
    }

    public function handle(mixed $data): mixed
    {
        return $this->processor->provide($data, $this->configuration->getOperation(), $this->configuration->getUriVariables(), $this->configuration->getContext());
    }
}