<?php

declare(strict_types=1);

namespace Zaprogramowani\Application\Entity;

class User
{
    private string $uuid;
    private string $username;
    private string $password;

    public function __construct(string $uuid, string $username, string $password)
    {
        $this->uuid = $uuid;
        $this->username = $username;
        $this->password = $password;
    }

    public function Uuid(): string
    {
        return $this->uuid;
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
