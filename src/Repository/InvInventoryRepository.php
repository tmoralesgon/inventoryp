<?php

namespace App\Repository;

use App\Entity\InvInventory;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InvInventory|null find($id, $lockMode = null, $lockVersion = null)
 * @method InvInventory|null findOneBy(array $criteria, array $orderBy = null)
 * @method InvInventory[]    findAll()
 * @method InvInventory[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InvInventoryRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InvInventory::class);
    }

    // /**
    //  * @return InvInventory[] Returns an array of InvInventory objects
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
    public function findOneBySomeField($value): ?InvInventory
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
