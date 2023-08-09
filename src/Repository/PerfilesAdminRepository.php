<?php

namespace App\Repository;

use App\Entity\PerfilesAdmin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PerfilesAdmin>
 *
 * @method PerfilesAdmin|null find($id, $lockMode = null, $lockVersion = null)
 * @method PerfilesAdmin|null findOneBy(array $criteria, array $orderBy = null)
 * @method PerfilesAdmin[]    findAll()
 * @method PerfilesAdmin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PerfilesAdminRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PerfilesAdmin::class);
    }

//    /**
//     * @return PerfilesAdmin[] Returns an array of PerfilesAdmin objects
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

//    public function findOneBySomeField($value): ?PerfilesAdmin
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
