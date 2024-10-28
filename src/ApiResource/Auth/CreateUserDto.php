<?php

namespace App\ApiResource\Auth;

use ApiPlatform\Metadata\Post;
use App\State\Auth\CreateUserProcessor;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use App\Contract\ApiResource\ApiResourceRequestInterface;
use App\Contract\ApiResource\ApiResourceResponseInterface;

#[Post(
    uriTemplate: '/auth/register',
    processor: CreateUserProcessor::class,
    output: false,
)]
#[UniqueEntity(fields: ['email'], message: 'Cette adresse email est déjà utilisée.', entityClass: User::class)]
#[UniqueEntity(fields: ['cliChrono'], message: 'Cette identifaint utilisateur est déjà utilisée.', entityClass: User::class)]
final readonly class CreateUserDto implements ApiResourceRequestInterface
{
    public function __construct(
        #[Assert\NotBlank]
        #[Assert\Email]
        public string $email,
        #[Assert\NotBlank]
        #[Assert\Length(min: 8)]
        public string $password,
        #[Assert\NotBlank]
        public int $cliChrono,
    ) {
    }
}
