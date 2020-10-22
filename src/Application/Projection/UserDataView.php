<?php

declare(strict_types=1);

namespace Zaprogramowani\Application\Projection;

use Zaprogramowani\Application\Entity\UserData;

class UserDataView implements \JsonSerializable
{
    /**
     * @var UserData[]
     */
    private array $userData;

    public function __construct(array $userData)
    {
        $this->userData = $userData;
    }

    public function jsonSerialize(): array
    {
        return [
            'user_data' => $this->userData,
        ];
    }
}
