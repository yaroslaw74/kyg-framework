<?php

/**
 * KYG Framework for Business.
 *
 * @category   Entity
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Modules\Users\Entity;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Softspring\AccountBundle\Model\AccountMembership as AccountMembershipModel;
use Softspring\AccountBundle\Model\AccountMembershipInterface;

#[ORM\Entity]
#[ORM\Table(name: 'users__account_membership')]
class AccountMembership extends AccountMembershipModel implements AccountMembershipInterface
{
    /**
     * @var list<string>
     */
    #[ORM\Column(name: 'roles', type: Types::JSON, nullable: false)]
    protected array $roles = [];

    /**
     * @return string[]
     */
    #[\Override]
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @phpstan-ignore missingType.iterableValue
     */
    #[\Override]
    public function setRoles(array $roles): void
    {
        $this->roles = array_values(array_unique($roles));
    }
}
