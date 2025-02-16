<?php

namespace App\Repository;

use App\Entity\RecenzjaTab;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RecenzjaTab>
 *
 * @method RecenzjaTab|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecenzjaTab|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecenzjaTab[]    findAll()
 * @method RecenzjaTab[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecenzjaTabRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RecenzjaTab::class);
    }

    //    /**
    //     * @return RecenzjaTab[] Returns an array of RecenzjaTab objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('r.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?RecenzjaTab
    //    {
    //        return $this->createQueryBuilder('r')
    //            ->andWhere('r.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
