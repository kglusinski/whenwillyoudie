<?php

declare(strict_types=1);

namespace Zaprogramowani\Tests\Application\Query;

use PHPUnit\Framework\TestCase;
use Zaprogramowani\Application\Exception\AgeOutOfRangeException;
use Zaprogramowani\Application\Exception\UnknownPlaceTypeException;
use Zaprogramowani\Application\Exception\UnknownSexException;
use Zaprogramowani\Application\Query\GetData;

final class GetDataTest extends TestCase
{
    private const TYPE_CITY = 0;
    private const TYPE_RURAL = 1;
    private const SEX_MALE = 0;
    private const SEX_FEMALE = 1;

    public function testItCanBeCreatedFromValidData(): void
    {
        $this->assertInstanceOf(
            GetData::class,
            new GetData(18, 1, self::SEX_MALE, self::TYPE_RURAL)
        );

        $this->assertInstanceOf(
            GetData::class,
            new GetData(18, 1, self::SEX_FEMALE, self::TYPE_CITY)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testItShouldThrowExceptionOnWrongData(int $age, int $placeType, int $sex, string $exception): void
    {
        $this->expectException($exception);
        new GetData($age, 1, $placeType, $sex);
    }

    public function dataProvider(): array
    {
        return [
            "too low age" => [-1, 1, 1, AgeOutOfRangeException::class],
            "too high age" => [101, 1, 1, AgeOutOfRangeException::class],
            "place type unknown #1" => [18, -1, 0, UnknownPlaceTypeException::class],
            "place type unknown #2" => [18, 2, 0, UnknownPlaceTypeException::class],
            "sex unknown #1" => [18, 1, -1, UnknownSexException::class],
            "sex unknown #2" => [18, 1, 2, UnknownSexException::class],
        ];
    }
}
