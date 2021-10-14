<?php

namespace App\Repository;

use App\Entity\PeriodeMensuselleApi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PeriodeMensuselleApi|null find($id, $lockMode = null, $lockVersion = null)
 * @method PeriodeMensuselleApi|null findOneBy(array $criteria, array $orderBy = null)
 * @method PeriodeMensuselleApi[]    findAll()
 * @method PeriodeMensuselleApi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PeriodeMensuselleApiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PeriodeMensuselleApi::class);
    }

    // /**
    //  * @return PeriodeMensuselleApi[] Returns an array of PeriodeMensuselleApi objects
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
    public function findOneBySomeField($value): ?PeriodeMensuselleApi
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
