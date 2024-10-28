<?php

namespace App\Query\Facturation;

use Symfony\Component\Messenger\Attribute\AsMessageHandler;


#[AsMessageHandler]
final readonly class RetrieveFactureByCliChronoHandler {
   public function __invoke(RetrieveFactureByCliChrono $query) {
    dd($query);
   }
}