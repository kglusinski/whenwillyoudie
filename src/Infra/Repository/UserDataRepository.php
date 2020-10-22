<?php

declare(strict_types=1);

namespace Zaprogramowani\Infra\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Zaprogramowani\Application\Entity\UserData as DomainUserData;
use Zaprogramowani\Application\Service\UserDataProjector;
use Zaprogramowani\Application\Service\UserDataStorage;
use Zaprogramowani\Infra\Entity\UserData;

class UserDataRepository extends ServiceEntityRepository implements UserDataStorage, UserDataProjector
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserData::class);
    }

    public function store(DomainUserData $userData): void
    {
        $ud = UserData::fromDomainUserData($userData);

        $this->_em->persist($ud);
        $this->_em->flush();
    }

    public function projectUserData(string $userId): array
    {
        $data = $this->_em->getRepository(UserData::class)->findBy(['userId' => $userId]);

        $domainUserData = [];

        foreach ($data as $obj) {
            $domainUserData[] = new DomainUserData($obj->getUserId(), $obj->getDeathProbability(), $obj->getLifeExpectancy());
        }

        return $domainUserData;
    }
}
