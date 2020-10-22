<?php

declare(strict_types=1);

namespace Zaprogramowani\Application\Command;

class RegisterUser
{
    private string $username;
    private string $password;

    public function __construct(string $username, string $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function Username(): string
    {
        return $this->username;
    }

    public function Password(): string
    {
        return $this->password;
    }
}
