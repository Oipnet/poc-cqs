<?php

namespace App\Command\Auth;

use App\Contract\Messenger\Command\MessengerCommandInterface;
use App\ApiResource\Auth\CreateUserDto;
use App\Contract\Handler\HandlerInterface;

final readonly class CreateUser implements MessengerCommandInterface
{
    public function __construct(
        private CreateUserDto $createUserDto,
        private HandlerInterface $processorHandler
    ) {
    }

    public function getCreateUserDto(): CreateUserDto
    {
        return $this->createUserDto;
    }

    public function getProcessorHandler(): HandlerInterface
    {
        return $this->processorHandler;
    }
}
