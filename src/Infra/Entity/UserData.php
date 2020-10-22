<?php

declare(strict_types=1);

namespace Zaprogramowani\Infra\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zaprogramowani\Application\Entity\UserData as DomainUserData;

/**
 * @ORM\Entity
 * @ORM\Table(name="user_data")
 */
class UserData
{
    /**
     * @ORM\Id()
     * @ORM\Column(type="string")
     * @ORM\GeneratedValue(strategy="UUID")
     */
    private $uuid;

    /**
     * @ORM\Column(type="string", unique=true)
     */
    private string $userId;

    /**
     * @ORM\Column(type="float")
     */
    private float $deathProbability;

    /**
     * @ORM\Column(type="float")
     */
    private float $lifeExpectancy;

    public function __construct(string $userId, float $deathProbability, float $lifeExpectancy)
    {
        $this->userId = $userId;
        $this->deathProbability = $deathProbability;
        $this->lifeExpectancy = $lifeExpectancy;
    }

    public function getUuid()
    {
        return $this->uuid;
    }

    public static function fromDomainUserData(DomainUserData $userData): self
    {
        return new self($userData->UserId(), $userData->DeathProbability(), $userData->LifeExpectancy());
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    /**
     * @param string $userId
     */
    public function setUserId(string $userId): void
    {
        $this->userId = $userId;
    }

    public function getDeathProbability(): float
    {
        return $this->deathProbability;
    }

    /**
     * @param float $deathProbability
     */
    public function setDeathProbability(float $deathProbability): void
    {
        $this->deathProbability = $deathProbability;
    }

    public function getLifeExpectancy(): float
    {
        return $this->lifeExpectancy;
    }

    /**
     * @param float $lifeExpectancy
     */
    public function setLifeExpectancy(float $lifeExpectancy): void
    {
        $this->lifeExpectancy = $lifeExpectancy;
    }
}
