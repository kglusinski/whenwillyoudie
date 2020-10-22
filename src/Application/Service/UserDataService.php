<?php

declare(strict_types=1);

namespace Zaprogramowani\Application\Service;

use Zaprogramowani\Application\Projection\UserDataView;

class UserDataService
{
    private UserDataProjector $projector;

    public function __construct(UserDataProjector $projector)
    {
        $this->projector = $projector;
    }

    public function getUserData(string $userId): UserDataView
    {
        $data = $this->projector->projectUserData($userId);

        return new UserDataView($data);
    }
}
