<?php

/**
 * KYG Framework for Business.
 *
 * @category   Repository
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Modules\Media\Repository;

use App\Modules\Media\Entity\SonataMediaGalleryItem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SonataMediaGalleryItem>
 */
class SonataMediaGalleryItemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SonataMediaGalleryItem::class);
    }

    /**
     * @return SonataMediaGalleryItem[] Returns an array of SonataMediaGalleryItem objects
     *
     * @phpstan-ignore missingType.parameter
     */
    public function findByExampleField($value): array
    {
        /*
         * @phpstan-ignore doctrine.dql
         */
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @phpstan-ignore missingType.parameter
     */
    public function findOneBySomeField($value): ?SonataMediaGalleryItem
    {
        /*
         * @phpstan-ignore doctrine.dql
         */
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
