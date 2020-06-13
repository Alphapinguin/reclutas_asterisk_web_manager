<?php

namespace App\Repository;

use App\Entity\PsAuths;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PsAuths|null find($id, $lockMode = null, $lockVersion = null)
 * @method PsAuths|null findOneBy(array $criteria, array $orderBy = null)
 * @method PsAuths[]    findAll()
 * @method PsAuths[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PsAuthsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PsAuths::class);
    }

    // /**
    //  * @return PsAuths[] Returns an array of PsAuths objects
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
    public function findOneBySomeField($value): ?PsAuths
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
