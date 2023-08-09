<?php

namespace App\Repository;

use App\Entity\PermisosAdmin;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PermisosAdmin>
 *
 * @method PermisosAdmin|null find($id, $lockMode = null, $lockVersion = null)
 * @method PermisosAdmin|null findOneBy(array $criteria, array $orderBy = null)
 * @method PermisosAdmin[]    findAll()
 * @method PermisosAdmin[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PermisosAdminRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PermisosAdmin::class);
    }

//    /**
//     * @return PermisosAdmin[] Returns an array of PermisosAdmin objects
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

//    public function findOneBySomeField($value): ?PermisosAdmin
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
