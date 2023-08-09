<?php

namespace App\Repository;

use App\Entity\PermisosPerfil;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PermisosPerfil>
 *
 * @method PermisosPerfil|null find($id, $lockMode = null, $lockVersion = null)
 * @method PermisosPerfil|null findOneBy(array $criteria, array $orderBy = null)
 * @method PermisosPerfil[]    findAll()
 * @method PermisosPerfil[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PermisosPerfilRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PermisosPerfil::class);
    }

//    /**
//     * @return PermisosPerfil[] Returns an array of PermisosPerfil objects
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

//    public function findOneBySomeField($value): ?PermisosPerfil
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
