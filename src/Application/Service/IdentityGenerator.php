<?php
declare(strict_types=1);

namespace Zaprogramowani\Application\Service;

interface IdentityGenerator
{
    public function generate(): string;
}
