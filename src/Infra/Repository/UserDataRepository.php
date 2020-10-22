<?php

declare(strict_types=1);

namespace Zaprogramowani\Infra\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Zaprogramowani\Application\Entity\UserData as DomainUserData;
use Zaprogramowani\Application\Service\UserDataStorage;
use Zaprogramowani\Infra\Entity\UserData;

class UserDataRepository extends ServiceEntityRepository implements UserDataStorage
{
    public function store(DomainUserData $userData): void
    {
        $ud = UserData::fromDomainUserData($userData);

        $this->_em->persist($ud);
        $this->_em->flush();
    }
}
