<?php

namespace App\Repository;

use App\Entity\VideoMedia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method VideoMedia|null find($id, $lockMode = null, $lockVersion = null)
 * @method VideoMedia|null findOneBy(array $criteria, array $orderBy = null)
 * @method VideoMedia[]    findAll()
 * @method VideoMedia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VideoMediaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VideoMedia::class);
    }

    // /**
    //  * @return VideoMedia[] Returns an array of VideoMedia objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?VideoMedia
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
