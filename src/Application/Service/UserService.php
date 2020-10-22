<?php

declare(strict_types=1);

namespace Zaprogramowani\Application\Service;

use Doctrine\ORM\Id\UuidGenerator;
use Zaprogramowani\Application\Command\RegisterUser;
use Zaprogramowani\Application\Entity\User;

class UserService
{
    private UserStoreInterface $userStore;
    private IdentityGenerator $generator;
    private PasswordEncoderInterface $encoder;

    public function __construct(
        UserStoreInterface $userStore,
        IdentityGenerator $generator,
        PasswordEncoderInterface $encoder
    )
    {
        $this->userStore = $userStore;
        $this->generator = $generator;
        $this->encoder = $encoder;
    }

    public function register(RegisterUser $command)
    {
        $uuid = $this->generator->generate();

        $user = new User($uuid, $command->Username(), $this->encoder->encode($command->Password()));

        $this->userStore->save($user);
    }
}
