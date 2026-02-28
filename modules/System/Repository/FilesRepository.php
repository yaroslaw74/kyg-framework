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

namespace App\Modules\System\Repository;

use App\Modules\System\Entity\Files;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Files>
 */
class FilesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Files::class);
    }

    /**
     * @return Files[] Returns an array of Files objects
     *
     * @phpstan-ignore missingType.parameter
     */
    public function findByExampleField($value): array
    {
        /* @phpstan-ignore doctrine.dql */
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @phpstan-ignore missingType.parameter
     */
    public function findOneBySomeField($value): ?Files
    {
        /* @phpstan-ignore doctrine.dql */
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
