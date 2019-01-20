<?php

namespace App\Repository;

use App\Entity\Natures;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Natures|null find($id, $lockMode = null, $lockVersion = null)
 * @method Natures|null findOneBy(array $criteria, array $orderBy = null)
 * @method Natures[]    findAll()
 * @method Natures[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class NaturesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Natures::class);
    }

//    /**
//     * @return Natures[] Returns an array of Natures objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('n.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Natures
    {
        return $this->createQueryBuilder('n')
            ->andWhere('n.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
