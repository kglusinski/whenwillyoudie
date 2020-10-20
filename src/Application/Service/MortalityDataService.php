<?php

declare(strict_types=1);

namespace Zaprogramowani\Application\Service;

use Zaprogramowani\Application\Projection\MortalityChanceView;
use Zaprogramowani\Application\Query\GetData;

class MortalityDataService implements MortalityDataServiceInterface
{
    public function process(GetData $query): MortalityChanceView
    {

    }
}
