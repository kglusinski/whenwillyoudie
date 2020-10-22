<?php

declare(strict_types=1);

namespace Zaprogramowani\Application\Service;

use Zaprogramowani\Application\Entity\User;

interface UserStoreInterface
{
    public function save(User $user);
}
