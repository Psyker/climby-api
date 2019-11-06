<?php

namespace App\Repository;

use App\Entity\ClimbingWay;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ClimbingWay|null find($id, $lockMode = null, $lockVersion = null)
 * @method ClimbingWay|null findOneBy(array $criteria, array $orderBy = null)
 * @method ClimbingWay[]    findAll()
 * @method ClimbingWay[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ClimbingWayRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ClimbingWay::class);
    }

    // /**
    //  * @return ClimbingWay[] Returns an array of ClimbingWay objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ClimbingWay
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
