<?php

namespace App\Processor;

use ApiPlatform\State\ProcessorInterface;
use App\Contract\Handler\HandlerInterface;

class ProcessorHandler implements HandlerInterface {
    public function __construct(
        private readonly ProcessorInterface $processor,
        private readonly Configuration $configuration
    )
    {
    }

    public function handle(mixed $data): mixed
    {
        return $this->processor->process($data, $this->configuration->getOperation(), $this->configuration->getUriVariables(), $this->configuration->getContext());
    }
}