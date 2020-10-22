<?php
declare(strict_types=1);

namespace Zaprogramowani\Application\Client;

interface DataSourceClientInterface
{
    public function lifeExpectancy(int $age, string $sex, string $placeType): float;
    public function deathProbability(int $age, string $sex, string $placeType): float;
}
