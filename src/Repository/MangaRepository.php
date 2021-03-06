<?php

namespace App\Repository;

use App\Entity\Manga;
use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;
use Doctrine\ORM\Query;

/**
 * @method Manga|null find($id, $lockMode = null, $lockVersion = null)
 * @method Manga|null findOneBy(array $criteria, array $orderBy = null)
 * @method Manga[]    findAll()
 * @method Manga[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MangaRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Manga::class);
    }

     /**
      * @return Manga[] 
     */
    public function findSome(): array
    {
        return $this->createQueryBuilder('m')
        ->setMaxResults(10)
        ->getQuery()
        ->getResult()
    ;
    }
     /**
      * @return Query 
     */
    public function findAllMangas(): Query
    {   
        $em = $this->getEntityManager();
        $dql = "SELECT m FROM App\Entity\Manga m  ";
        $query = $em->createQuery($dql);
        return $query
    ;
    }

    

    /**
      * @return Query 
     */
    public function findbyCat(Category $category): Query
    {
        return $this->createQueryBuilder('m')
        ->innerJoin('m.categories', 'c')
        ->where('c.id = :cat_id')
        ->setParameter('cat_id', $category->getId())
        ->getQuery()
        
    ;
    }

    

    // /**
    //  * @return Manga[] Returns an array of Manga objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Manga
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
