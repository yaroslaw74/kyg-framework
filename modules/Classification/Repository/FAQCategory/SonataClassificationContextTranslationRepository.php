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

namespace App\Modules\Classification\Repository\FAQCategory;

use App\Modules\Classification\Entity\FAQCategory\SonataClassificationContextTranslation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<SonataClassificationContextTranslation>
 */
class SonataClassificationContextTranslationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SonataClassificationContextTranslation::class);
    }

    /**
     * @return SonataClassificationContextTranslation[] Returns an array of SonataClassificationContextTranslation objects
     *
     *  @phpstan-ignore missingType.parameter
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
    public function findOneBySomeField($value): ?SonataClassificationContextTranslation
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
