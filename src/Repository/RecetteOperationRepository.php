<?php

namespace App\Repository;

use App\Entity\RecetteOperation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RecetteOperation|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecetteOperation|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecetteOperation[]    findAll()
 * @method RecetteOperation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecetteOperationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RecetteOperation::class);
    }

    // /**
    //  * @return RecetteOperation[] Returns an array of RecetteOperation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RecetteOperation
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
