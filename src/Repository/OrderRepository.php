<?php

namespace App\Repository;

use App\Entity\Orderr;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\Query;

/**
 * @method Orderr|null find($id, $lockMode = null, $lockVersion = null)
 * @method Orderr|null findOneBy(array $criteria, array $orderrBy = null)
 * @method Orderr[]    findAll()
 * @method Orderr[]    findBy(array $criteria, array $orderrBy = null, $limit = null, $offset = null)
 */
class OrderRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Orderr::class);
    }
    /**
      * @return Query 
     */
    public function findAllOrders(): Query
    {   
        $em = $this->getEntityManager();
        $dql = "SELECT o FROM App\Entity\Orderr o  ";
        $query = $em->createQuery($dql);
        return $query
    ;
    }

    // /**
    //  * @return Order[] Returns an array of Order objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Order
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
