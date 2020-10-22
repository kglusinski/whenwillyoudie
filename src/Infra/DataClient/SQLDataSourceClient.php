<?php

declare(strict_types=1);

namespace Zaprogramowani\Infra\DataClient;

use Zaprogramowani\Application\Client\DataSourceClientInterface;

class SQLDataSourceClient implements DataSourceClientInterface
{
    private \PDO $db;

    // todo: extract PDO outside this class
    public function __construct(string  $dsn, string $username, string $password)
    {
        $this->db = new \PDO($dsn, $username, $password);
    }

    public function lifeExpectancy(int $age, string $sex, string $placeType): float
    {
        $stmt = $this->db->prepare("SELECT life_expectancy FROM life_expectancy WHERE age = ? AND sex = ? AND place_type = ?");
        $stmt->execute([$age, $sex, $placeType]);

        $val = $stmt->fetchColumn();

        return floatval($val);
    }

    public function deathProbability(int $age, string $sex, string $placeType): float
    {
        $stmt = $this->db->prepare("SELECT dying_probability FROM life_expectancy WHERE age = ? AND sex = ? AND place_type = ?");
        $stmt->execute([$age, $sex, $placeType]);

        $val = $stmt->fetchColumn();

        return floatval($val);
    }
}
