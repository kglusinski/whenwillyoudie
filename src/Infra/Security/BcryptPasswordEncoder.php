<?php

declare(strict_types=1);

namespace Zaprogramowani\Infra\Security;

use Zaprogramowani\Application\Service\PasswordEncoderInterface;

class BcryptPasswordEncoder implements PasswordEncoderInterface
{
    const COST = 13;

    public function encode(string $password): string
    {
        return password_hash($password, PASSWORD_BCRYPT, ['cost' => self::COST]);
    }
}
