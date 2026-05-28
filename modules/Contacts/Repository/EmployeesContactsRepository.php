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

namespace App\Modules\Contacts\Repository;

use App\Modules\Contacts\Entity\EmployeesContacts;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<EmployeesContacts>
 */
class EmployeesContactsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EmployeesContacts::class);
    }

    /**
     * @return EmployeesContacts[] Returns an array of EmployeesContacts objects
     *
     * @phpstan-ignore missingType.parameter
     */
    public function findByExampleField($value): array
    {
        /* @phpstan-ignore doctrine.dql */
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @phpstan-ignore missingType.parameter
     */
    public function findOneBySomeField($value): ?EmployeesContacts
    {
        /* @phpstan-ignore doctrine.dql */
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
}
