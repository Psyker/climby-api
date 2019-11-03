<?php

namespace App\Repository;

use App\Entity\PhotoMedia;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PhotoMedia|null find($id, $lockMode = null, $lockVersion = null)
 * @method PhotoMedia|null findOneBy(array $criteria, array $orderBy = null)
 * @method PhotoMedia[]    findAll()
 * @method PhotoMedia[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PhotoMediaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PhotoMedia::class);
    }

    // /**
    //  * @return PhotoMedia[] Returns an array of PhotoMedia objects
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
    public function findOneBySomeField($value): ?PhotoMedia
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
