<?php

declare(strict_types=1);

namespace Zaprogramowani\Application\Service;

interface UserDataProjector
{
    public function projectUserData(string $userId): array;
}
