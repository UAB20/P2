<?php

namespace App\Repository;

use App\Entity\PhotoGalleryPost;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PhotoGalleryPost|null find($id, $lockMode = null, $lockVersion = null)
 * @method PhotoGalleryPost|null findOneBy(array $criteria, array $orderBy = null)
 * @method PhotoGalleryPost[]    findAll()
 * @method PhotoGalleryPost[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PhotoGalleryPostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PhotoGalleryPost::class);
    }

    // /**
    //  * @return PhotoGalleryPost[] Returns an array of PhotoGalleryPost objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PhotoGalleryPost
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
