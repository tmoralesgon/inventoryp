<?php

namespace App\Repository;

use App\Entity\InvUser;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InvUser|null find($id, $lockMode = null, $lockVersion = null)
 * @method InvUser|null findOneBy(array $criteria, array $orderBy = null)
 * @method InvUser[]    findAll()
 * @method InvUser[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InvUserRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InvUser::class);
    }

    // /**
    //  * @return InvUser[] Returns an array of InvUser objects
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

    public function findOneById($value): ?InvUser
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.id = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    
}
