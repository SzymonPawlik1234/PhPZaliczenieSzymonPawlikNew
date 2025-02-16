<?php

namespace App\Repository;

use App\Entity\ProduktTab;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ProduktTab>
 *
 * @method ProduktTab|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProduktTab|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProduktTab[]    findAll()
 * @method ProduktTab[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduktTabRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProduktTab::class);
    }

    //    /**
    //     * @return ProduktTab[] Returns an array of ProduktTab objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?ProduktTab
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
