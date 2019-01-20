<?php

namespace App\Repository;

use App\Entity\Sujets;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Sujets|null find($id, $lockMode = null, $lockVersion = null)
 * @method Sujets|null findOneBy(array $criteria, array $orderBy = null)
 * @method Sujets[]    findAll()
 * @method Sujets[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SujetsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Sujets::class);
    }

    public function s1t()
    {
        $qb = $this->_em->createQueryBuilder();
        $qb->delete('App\Entity\Sujets', 'e')
            ->where('1=1');
        $res = $qb->getQuery()->execute();
        echo "Suppression effectuée.", $res;
        return $res;
    }

public function l1psu(){
    $qb = $this->_em->createQueryBuilder();
    $qb ->select('e.objet,e.id')
        ->from('App\Entity\Sujets', 'e')
        ->where('1=1')
        ->orderBy('e.objet', 'ASC');
    $res = $qb->getQuery()->getResult();
//    echo "$$$$$$$$$ l1psu $$$$$$$$$$$$$$$$",json_encode($res);
    return $res;
}
//    /**
//     * @return Sujets[] Returns an array of Sujets objects
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
    public function findOneBySomeField($value): ?Sujets
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
