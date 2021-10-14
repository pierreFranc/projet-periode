<?php

namespace App\Repository;

use App\Entity\PeriodeMensuelleApi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PeriodeMensuelleApi|null find($id, $lockMode = null, $lockVersion = null)
 * @method PeriodeMensuelleApi|null findOneBy(array $criteria, array $orderBy = null)
 * @method PeriodeMensuelleApi[]    findAll()
 * @method PeriodeMensuelleApi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PeriodeMensuelleApiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PeriodeMensuelleApi::class);
    }

    // /**
    //  * @return PeriodeMensuelleApi[] Returns an array of PeriodeMensuelleApi objects
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
    public function findOneBySomeField($value): ?PeriodeMensuelleApi
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
