<?php

namespace App\Repository;

use App\Entity\Testbranchemain;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Testbranchemain|null find($id, $lockMode = null, $lockVersion = null)
 * @method Testbranchemain|null findOneBy(array $criteria, array $orderBy = null)
 * @method Testbranchemain[]    findAll()
 * @method Testbranchemain[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TestbranchemainRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Testbranchemain::class);
    }

    // /**
    //  * @return Testbranchemain[] Returns an array of Testbranchemain objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Testbranchemain
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
