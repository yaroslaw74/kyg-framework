<?php
/**
 * KYG Framework for Business.
 *
 * @category   Contract Repository
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);
namespace App\Modules\Users\Contract\Repository;

use App\Modules\Users\Entity\User;
use Symfony\Component\Uid\Uuid;

interface UserRepositoryInterface
{
    public function findOneById(?Uuid $Id): ?User;
}
