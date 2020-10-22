<?php

declare(strict_types=1);

namespace Zaprogramowani\Application\Entity;

class UserData implements \JsonSerializable
{
    private string $userId;
    private float $deathProbability;
    private float $lifeExpectancy;

    public function __construct(string $userId, float $deathProbability, float $lifeExpectancy)
    {
        $this->userId = $userId;
        $this->deathProbability = $deathProbability;
        $this->lifeExpectancy = $lifeExpectancy;
    }

    public function UserId(): string
    {
        return $this->userId;
    }

    public function DeathProbability(): float
    {
        return $this->deathProbability;
    }

    public function LifeExpectancy(): float
    {
        return $this->lifeExpectancy;
    }

    public function jsonSerialize()
    {
       return [
           'life_expectancy' => $this->lifeExpectancy,
           'death_probability' => $this->deathProbability
       ];
    }
}
