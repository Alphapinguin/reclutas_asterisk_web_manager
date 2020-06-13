<?php

namespace App\Repository;

use App\Entity\PsEndpoints;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PsEndpoints|null find($id, $lockMode = null, $lockVersion = null)
 * @method PsEndpoints|null findOneBy(array $criteria, array $orderBy = null)
 * @method PsEndpoints[]    findAll()
 * @method PsEndpoints[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PsEndpointsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PsEndpoints::class);
    }

    // /**
    //  * @return PsEndpoints[] Returns an array of PsEndpoints objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PsEndpoints
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
