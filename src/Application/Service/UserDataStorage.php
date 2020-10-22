<?php
declare(strict_types=1);

namespace Zaprogramowani\Application\Service;

use Zaprogramowani\Application\Entity\UserData;

interface UserDataStorage
{
    public function store(UserData $userData): void;
}
