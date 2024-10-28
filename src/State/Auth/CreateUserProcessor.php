<?php

namespace App\State\Auth;

use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProcessorInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;
use ApiPlatform\State\Processor\PersistProcessor;
use App\Entity\User;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use App\ApiResource\Auth\UserOutput;
use App\UseCase\Auth\CreateUserUseCase;
use App\Processor\ProcessorHandler;
use App\Processor\Configuration;

final readonly class CreateUserProcessor implements ProcessorInterface
{
    public function __construct(
        #[Autowire(service: 'api_platform.doctrine.orm.state.persist_processor')]
        private ProcessorInterface $decoratedProcessor,
        private UserPasswordHasherInterface $passwordHasher,
        private CreateUserUseCase $createUserUseCase,
    )
    {
    }

    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): mixed
    {
        return $this->createUserUseCase->process($data, new ProcessorHandler($this->decoratedProcessor, new Configuration($operation, $uriVariables, $context)));
    }
}
