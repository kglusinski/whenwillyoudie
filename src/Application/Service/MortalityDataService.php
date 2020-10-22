<?php

declare(strict_types=1);

namespace Zaprogramowani\Application\Service;

use Zaprogramowani\Application\Client\DataSourceClientInterface;
use Zaprogramowani\Application\Entity\UserData;
use Zaprogramowani\Application\Projection\MortalityChanceView;
use Zaprogramowani\Application\Query\GetData;

class MortalityDataService implements MortalityDataServiceInterface
{
    private DataSourceClientInterface $client;
    private UserDataStorage $storage;

    public function __construct(DataSourceClientInterface $client, UserDataStorage $storage)
    {
        $this->client = $client;
        $this->storage = $storage;
    }

    public function process(GetData $query, string $userId): MortalityChanceView
    {
        $data = [
            "life_expectancy" => $this->client->lifeExpectancy($query->Age(), $query->Sex(), $query->PlaceType()),
            "death_probability" => $this->client->deathProbability($query->Age(), $query->Sex(), $query->PlaceType()),
        ];

        $userData = new UserData($userId, $data["life_expectancy"], $data["death_probability"]);

        $this->storage->store($userData);

        return new MortalityChanceView($data["life_expectancy"], $data["death_probability"]);
    }
}
