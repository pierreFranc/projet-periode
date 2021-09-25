<?php

namespace App\Repository;

use App\Entity\PeriodeMensuelle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PeriodeMensuelle|null find($id, $lockMode = null, $lockVersion = null)
 * @method PeriodeMensuelle|null findOneBy(array $criteria, array $orderBy = null)
 * @method PeriodeMensuelle[]    findAll()
 * @method PeriodeMensuelle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PeriodeMensuelleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PeriodeMensuelle::class);
    }

    // /**
    //  * @return PeriodeMensuelle[] Returns an array of PeriodeMensuelle objects
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
    public function findOneBySomeField($value): ?PeriodeMensuelle
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
