<?php

namespace App\Repository;

use App\Entity\InvItems;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InvItems|null find($id, $lockMode = null, $lockVersion = null)
 * @method InvItems|null findOneBy(array $criteria, array $orderBy = null)
 * @method InvItems[]    findAll()
 * @method InvItems[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InvItemsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InvItems::class);
    }

    // /**
    //  * @return InvItems[] Returns an array of InvItems objects
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
    public function findOneBySomeField($value): ?InvItems
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
