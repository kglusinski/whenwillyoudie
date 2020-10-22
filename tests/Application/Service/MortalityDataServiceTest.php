<?php

declare(strict_types=1);

namespace Zaprogramowani\Tests\Application\Service;

use PHPUnit\Framework\TestCase;
use Zaprogramowani\Application\Client\DataSourceClientInterface;
use Zaprogramowani\Application\Projection\MortalityChanceView;
use Zaprogramowani\Application\Query\GetData;
use Zaprogramowani\Application\Service\MortalityDataService;

class MortalityDataServiceTest extends TestCase
{
    public function testItShouldCreateView()
    {
        // given
        $query = new GetData(18, 0, 0);
        $expected = new MortalityChanceView(25.0, 0.0025);
        $client = $this->createMock(DataSourceClientInterface::class);
        $client->method('lifeExpectancy')->willReturn(25.0);
        $client->method('deathProbability')->willReturn(0.0025);

        $serviceUnderTest = new MortalityDataService($client);

        // when
        $result = $serviceUnderTest->process($query);

        // then
        $this->assertEquals($expected->jsonSerialize(), $result->jsonSerialize());
    }
}
