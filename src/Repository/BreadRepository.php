<?php

namespace App\Repository;

use App\Entity\Bread;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class BreadRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Bread::class);
    }


    /**
     * @return Bread
     *
     * @throws \Doctrine\ORM\NoResultException
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function getUpcomingBake()
    {
        return $this->createQueryBuilder('b')
            ->orderBy('b.id', 'DESC')
            ->where('b.bakingDay >= :now')
            ->setParameters([
                'now' => new \DateTime()
            ])
            ->setMaxResults(1)
            ->getQuery()
            ->getSingleResult()
        ;
    }
}
