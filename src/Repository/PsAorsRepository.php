<?php

namespace App\Repository;

use App\Entity\PsAors;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PsAors|null find($id, $lockMode = null, $lockVersion = null)
 * @method PsAors|null findOneBy(array $criteria, array $orderBy = null)
 * @method PsAors[]    findAll()
 * @method PsAors[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PsAorsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PsAors::class);
    }

    // /**
    //  * @return PsAors[] Returns an array of PsAors objects
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
    public function findOneBySomeField($value): ?PsAors
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
