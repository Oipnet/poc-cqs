<?php

namespace App\Command\Auth;

use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use ApiPlatform\State\ProcessorInterface;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

#[AsMessageHandler]
final readonly class CreateUserHandler
{
    public function __construct(
        private UserPasswordHasherInterface $passwordHasher,
    )
    {
    }

    public function __invoke(CreateUser $command): void
    {
        $data = $command->getCreateUserDto();
        $processorHandler = $command->getProcessorHandler();
        
        $user = new User();
        $user->setEmail($data->email);
        $user->setPassword($this->passwordHasher->hashPassword($user, $data->password));
        $user->setCliChrono($data->cliChrono);

        $processorHandler->handle($user);
    }
}
