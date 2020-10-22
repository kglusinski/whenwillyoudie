<?php

declare(strict_types=1);

namespace Zaprogramowani\Application\Service;

use Zaprogramowani\Application\Client\DataSourceClientInterface;
use Zaprogramowani\Application\Projection\MortalityChanceView;
use Zaprogramowani\Application\Query\GetData;

class MortalityDataService implements MortalityDataServiceInterface
{
    private DataSourceClientInterface $client;

    public function __construct(DataSourceClientInterface $client)
    {
        $this->client = $client;
    }

    public function process(GetData $query): MortalityChanceView
    {
        $data = [
            "life_expectancy" => $this->client->lifeExpectancy($query->Age(), $query->Sex(), $query->PlaceType()),
            "death_probability" => $this->client->deathProbability($query->Age(), $query->Sex(), $query->PlaceType()),
        ];

        return new MortalityChanceView($data["life_expectancy"], $data["death_probability"]);
    }
}
