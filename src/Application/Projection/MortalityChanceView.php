<?php

declare(strict_types=1);

namespace Zaprogramowani\Application\Projection;

final class MortalityChanceView implements \JsonSerializable
{
    private float $lifeExpectancy;
    private float $deathProbability;

    public function __construct(float $lifeExpectancy, float $deathProbability)
    {
        $this->lifeExpectancy = $lifeExpectancy;
        $this->deathProbability = $deathProbability;
    }

    public function jsonSerialize(): array
    {
        $dp = sprintf("%.2f%%", $this->deathProbability * 100);

        return [
            'life_expectancy' => $this->lifeExpectancy,
            'death_probability' => $dp,
        ];
    }
}
