<?php

namespace App\Processor;

use ApiPlatform\Metadata\Operation;

class Configuration
{
    public function __construct(
        private readonly Operation $operation,
        private readonly array $uriVariables,
        private readonly array $context
    )
    {
    }
    
    public function getOperation(): Operation
    {
        return $this->operation;
    }

    public function getUriVariables(): array
    {
        return $this->uriVariables;
    }

    public function getContext(): array
    {
        return $this->context;
    }
}