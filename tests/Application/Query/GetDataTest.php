<?php

declare(strict_types=1);

namespace Zaprogramowani\Tests\Application\Query;

use PHPUnit\Framework\TestCase;
use Zaprogramowani\Application\Exception\AgeOutOfRangeException;
use Zaprogramowani\Application\Exception\UnknownPlaceTypeException;
use Zaprogramowani\Application\Query\GetData;

final class GetDataTest extends TestCase
{
    private const TYPE_CITY = 0;
    private const TYPE_RURAL = 1;

    public function testItCanBeCreatedFromValidData(): void
    {
        $this->assertInstanceOf(
            GetData::class,
            new GetData(18, 1, self::TYPE_RURAL)
        );

        $this->assertInstanceOf(
            GetData::class,
            new GetData(18, 1, self::TYPE_CITY)
        );
    }

    /**
     * @dataProvider dataProvider
     */
    public function testItShouldThrowExceptionOnWrongData(int $age, int $placeType, string $exception): void
    {
        $this->expectException($exception);
        new GetData($age, 1, $placeType);
    }

    public function dataProvider(): array
    {
        return [
            "too low age" => [-1, 1, AgeOutOfRangeException::class],
            "too high age" => [101, 1, AgeOutOfRangeException::class],
            "place type unknown #1" => [18, -1, UnknownPlaceTypeException::class],
            "place type unknown #2" => [18, 2, UnknownPlaceTypeException::class],
        ];
    }
}
