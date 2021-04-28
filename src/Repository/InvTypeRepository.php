<?php

namespace App\Repository;

use App\Entity\InvType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InvType|null find($id, $lockMode = null, $lockVersion = null)
 * @method InvType|null findOneBy(array $criteria, array $orderBy = null)
 * @method InvType[]    findAll()
 * @method InvType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InvTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InvType::class);
    }

    // /**
    //  * @return InvType[] Returns an array of InvType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InvType
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
