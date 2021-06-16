<?php

namespace App\Repository;

use App\Entity\Loc;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Loc|null find($id, $lockMode = null, $lockVersion = null)
 * @method Loc|null findOneBy(array $criteria, array $orderBy = null)
 * @method Loc[]    findAll()
 * @method Loc[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LocRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Loc::class);
    }

    // /**
    //  * @return Loc[] Returns an array of Loc objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Loc
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
