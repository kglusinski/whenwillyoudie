<?php
declare(strict_types=1);

namespace Zaprogramowani\Application\Service;

interface PasswordEncoderInterface
{
    public function encode(string $password): string;
}
