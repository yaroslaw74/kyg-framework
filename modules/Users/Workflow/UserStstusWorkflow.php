<?php

/**
 * KYG Framework for Business.
 *
 * @category   Workflow
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Modules\Users\Workflow;

use App\Modules\Users\Entity\User;
use App\Modules\Users\Enum\UserStatus;
use Symfony\Component\Workflow\Attribute\AsWorkflow;
use Symfony\Component\Workflow\Attribute\Transition;
use Symfony\Component\Workflow\WorkflowType;

#[AsWorkflow(type: WorkflowType::StateMachine, supports: User::class, initialMarking: UserStatus::NEW, markingProperty: 'status', auditTrail: true, places: UserStatus::class)]
class UserStstusWorkflow
{
    #[Transition(from: UserStatus::NEW, to: UserStatus::VALIDATED)]
    public const VALIDATED = 'validated';

    #[Transition(from: UserStatus::VALIDATED, to: UserStatus::PENDING)]
    public const PENDING = 'pending';

    #[Transition(from: UserStatus::NEW, to: UserStatus::ACTIVE)]
    #[Transition(from: UserStatus::PENDING, to: UserStatus::ACTIVE)]
    #[Transition(from: UserStatus::INACTIVE, to: UserStatus::ACTIVE)]
    #[Transition(from: UserStatus::DISABLED, to: UserStatus::ACTIVE)]
    #[Transition(from: UserStatus::VALIDATED, to: UserStatus::ACTIVE)]
    public const ACTIVE = 'active';

    #[Transition(from: UserStatus::ACTIVE, to: UserStatus::INACTIVE)]
    public const INACTIVE = 'inactive';

    #[Transition(from: UserStatus::ACTIVE, to: UserStatus::BANNED)]
    public const BANNED = 'banned';

    #[Transition(from: UserStatus::NEW, to: UserStatus::DELETED)]
    #[Transition(from: UserStatus::PENDING, to: UserStatus::DELETED)]
    #[Transition(from: UserStatus::ACTIVE, to: UserStatus::DELETED)]
    #[Transition(from: UserStatus::INACTIVE, to: UserStatus::DELETED)]
    #[Transition(from: UserStatus::BANNED, to: UserStatus::DELETED)]
    #[Transition(from: UserStatus::DISABLED, to: UserStatus::DELETED)]
    #[Transition(from: UserStatus::VALIDATED, to: UserStatus::DELETED)]
    public const DELETED = 'deleted';

    #[Transition(from: UserStatus::NEW, to: UserStatus::DISABLED)]
    #[Transition(from: UserStatus::PENDING, to: UserStatus::DISABLED)]
    #[Transition(from: UserStatus::ACTIVE, to: UserStatus::DISABLED)]
    #[Transition(from: UserStatus::INACTIVE, to: UserStatus::DISABLED)]
    #[Transition(from: UserStatus::BANNED, to: UserStatus::DISABLED)]
    #[Transition(from: UserStatus::VALIDATED, to: UserStatus::DISABLED)]
    public const DISABLED = 'disabled';

    #[Transition(from: UserStatus::BANNED, to: UserStatus::DISABLED)]
    public const NOT_BANNED = 'not_banned';

    #[Transition(from: UserStatus::DELETED, to: UserStatus::DISABLED)]
    public const NOT_DELETED = 'not_deleted';
}
