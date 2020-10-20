<?php

declare(strict_types=1);

namespace Zaprogramowani\Application\Query;

use Zaprogramowani\Application\Exception\AgeOutOfRangeException;
use Zaprogramowani\Application\Exception\UnknownPlaceTypeException;

class GetData
{
    private const TYPE_CITY = 0;
    private const TYPE_RURAL = 1;

    private int $age;
    private int $place;
    private int $placeType;

    public function __construct(int $age, int $place, int $placeType)
    {
        if ($age < 0 || $age > 100) {
            throw new AgeOutOfRangeException();
        }
        $this->age = $age;

        $this->place = $place;

        if ($placeType != self::TYPE_CITY && $placeType != self::TYPE_RURAL) {
            throw new UnknownPlaceTypeException();
        }
        $this->placeType = $placeType;
    }

    public function Age(): int
    {
        return $this->age;
    }

    public function Place(): int
    {
        return $this->place;
    }

    public function PlaceType(): int
    {
        return $this->placeType;
    }

}
