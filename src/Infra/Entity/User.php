<?php

declare(strict_types=1);

namespace Zaprogramowani\Infra\Entity;

use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\Column(type="string")
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private string $id;

    /**
     * @ORM\Column(type="string")
     */
    private string $username;

    /**
     * @ORM\Column(type="string")
     */
    private string $password;

    public function getRoles(): array
    {
        return ["user"];
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getPassword(): string
    {
        $this->password;
    }

    public function getSalt()
    {
        // Not needed while hashing algorithm is bcrypt
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function eraseCredentials(): void
    {
        $this->password = "";
    }
}
