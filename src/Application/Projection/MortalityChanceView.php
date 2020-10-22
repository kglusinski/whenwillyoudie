<?php

declare(strict_types=1);

namespace Zaprogramowani\Application\Projection;

final class MortalityChanceView implements \JsonSerializable
{
    private float $lifeExpectancy;

    public function __construct(float $lifeExpectancy)
    {
        $this->lifeExpectancy = $lifeExpectancy;
    }

    public function jsonSerialize(): array
    {
        return [
            'life_expectancy' => $this->lifeExpectancy
        ];
    }
}
