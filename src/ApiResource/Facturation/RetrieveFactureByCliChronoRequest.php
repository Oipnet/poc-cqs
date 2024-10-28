<?php

namespace App\ApiResource\Facturation;

use ApiPlatform\Metadata\Get;
use App\State\Facturation\RetrieveFactureByCliChronoProvider;
use App\Contract\ApiResource\ApiResourceRequestInterface;

#[Get(
    uriTemplate: '/user/{cliChrono}/factures/{id}',
    provider: RetrieveFactureByCliChronoProvider::class
)]
class RetrieveFactureByCliChronoRequest implements ApiResourceRequestInterface {
    public function __construct(
        public readonly int $id,
        public readonly int $cliChrono,
    ){}
}