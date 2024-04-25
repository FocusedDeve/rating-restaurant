<?php

namespace App\Repository;

use App\Entity\ImageRestaurent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ImageRestaurent>
 *
 * @method ImageRestaurent|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImageRestaurent|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImageRestaurent[]    findAll()
 * @method ImageRestaurent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImageRestaurentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImageRestaurent::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(ImageRestaurent $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(ImageRestaurent $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    // /**
    //  * @return ImageRestaurent[] Returns an array of ImageRestaurent objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ImageRestaurent
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
