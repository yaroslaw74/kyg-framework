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

namespace App\Modules\Classification\Repository\Translation;

use App\Modules\Classification\Entity\Translation\CategoryTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CategoryTranslation>
 */
class CategoryTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategoryTranslation::class);
    }

    /**
     * @return CategoryTranslation[] Returns an array of CategoryTranslation objects
     *
     * @phpstan-ignore missingType.parameter
     */
    public function findByExampleField($value): array
    {
        /* @phpstan-ignore doctrine.dql */
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @phpstan-ignore missingType.parameter
     */
    public function findOneBySomeField($value): ?CategoryTranslation
    {
        /* @phpstan-ignore doctrine.dql */
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
