<?php

namespace App\Repository;

use App\Entity\SousDomaines;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method SousDomaines|null find($id, $lockMode = null, $lockVersion = null)
 * @method SousDomaines|null findOneBy(array $criteria, array $orderBy = null)
 * @method SousDomaines[]    findAll()
 * @method SousDomaines[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SousDomainesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, SousDomaines::class);
    }

//    /**
//     * @return SousDomaines[] Returns an array of SousDomaines objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SousDomaines
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
