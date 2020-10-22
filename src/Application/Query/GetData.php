<?php

declare(strict_types=1);

namespace Zaprogramowani\Application\Query;

use Zaprogramowani\Application\Exception\AgeOutOfRangeException;
use Zaprogramowani\Application\Exception\UnknownPlaceTypeException;
use Zaprogramowani\Application\Exception\UnknownSexException;

class GetData
{
    private const TYPE_CITY = 0;
    private const TYPE_RURAL = 1;

    private const SEX_MALE = 0;
    private const SEX_FEMALE = 1;

    private int $age;
    private int $placeType;
    private int $sex;

    public function __construct(int $age, int $placeType, int $sex)
    {
        if ($age < 0 || $age > 100) {
            throw new AgeOutOfRangeException();
        }
        $this->age = $age;

        if ($placeType != self::TYPE_CITY && $placeType != self::TYPE_RURAL) {
            throw new UnknownPlaceTypeException();
        }
        $this->placeType = $placeType;

        if ($sex != self::SEX_MALE && $sex != self::SEX_FEMALE) {
            throw new UnknownSexException();
        }
        $this->sex = $sex;
    }

    public function Age(): int
    {
        return $this->age;
    }

    public function PlaceType(): string
    {
        switch ($this->placeType) {
            case self::TYPE_CITY:
                return 'city';
            case self::TYPE_RURAL:
                return 'rural';
            default: return "";
        }
    }

    public function Sex(): string
    {
        switch ($this->placeType) {
            case self::SEX_MALE:
                return 'male';
            case self::SEX_FEMALE:
                return 'female';
            default:
                return "";
        }
    }
}
