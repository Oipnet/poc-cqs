<?php

namespace App\Contract\Handler;

interface HandlerInterface {
    public function handle(mixed $data): mixed;
}