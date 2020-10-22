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
        $data = $this->client->lifeExpectancy($query->Age(), $query->Sex(), $query->PlaceType());

        $view = new MortalityChanceView($data);

        return $view;
    }
}
