<?php

namespace App\Repository;

use App\Entity\Matchplayer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Matchplayer|null find($id, $lockMode = null, $lockVersion = null)
 * @method Matchplayer|null findOneBy(array $criteria, array $orderBy = null)
 * @method Matchplayer[]    findAll()
 * @method Matchplayer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MatchplayerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Matchplayer::class);
    }

    // /**
    //  * @return Matchplayer[] Returns an array of Matchplayer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Matchplayer
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
