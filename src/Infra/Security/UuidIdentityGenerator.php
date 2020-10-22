<?php

declare(strict_types=1);

namespace Zaprogramowani\Infra\Security;

use Ramsey\Uuid\Uuid;
use Zaprogramowani\Application\Service\IdentityGenerator;

class UuidIdentityGenerator implements IdentityGenerator
{
    public function generate(): string
    {
        return Uuid::uuid4()->toString();
    }
}
