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

namespace App\Modules\Nomenclature\Repository\Translation;

use App\Modules\Nomenclature\Entity\Translation\TagsTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TagsTranslation>
 */
class TagsTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TagsTranslation::class);
    }

    /**
     * @return TagsTranslation[] Returns an array of TagsTranslation objects
     *
     * @phpstan-ignore missingType.parameter
     */
    public function findByExampleField($value): array
    {
        /* @phpstan-ignore doctrine.dql */
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @phpstan-ignore missingType.parameter
     */
    public function findOneBySomeField($value): ?TagsTranslation
    {
        /* @phpstan-ignore doctrine.dql */
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
