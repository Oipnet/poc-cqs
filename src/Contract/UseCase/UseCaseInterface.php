<?php

namespace App\Contract\UseCase;

use App\Contract\ApiResource\ApiResourceRequestInterface;
use App\Contract\ApiResource\ApiResourceResponseInterface;
use App\Processor\ProcessorHandler;

interface UseCaseInterface
{
    public function process(ApiResourceRequestInterface $input, ProcessorHandler $processorHandler): ?ApiResourceResponseInterface;
}
