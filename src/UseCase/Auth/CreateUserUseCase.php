<?php

namespace App\UseCase\Auth;

use App\Entity\User;
use App\Contract\UseCase\UseCaseInterface;
use App\ApiResource\Auth\CreateUserDto;
use App\Contract\ApiResource\ApiResourceRequestInterface;
use App\Contract\ApiResource\ApiResourceResponseInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use App\Command\Auth\CreateUser;
use App\Contract\Messenger\Command\MessengerCommandBusInterface;
use App\Contract\Handler\HandlerInterface;

final readonly class CreateUserUseCase implements UseCaseInterface
{
    public function __construct(
        private readonly MessengerCommandBusInterface $messengerCommandBus
    )
    {
    }

    public function process(ApiResourceRequestInterface $input, HandlerInterface $processorHandler): ?ApiResourceResponseInterface
    {
        assert($input instanceof CreateUserDto);

        $this->messengerCommandBus->dispatch(new CreateUser($input, $processorHandler));
        
        return null;
    }
}
