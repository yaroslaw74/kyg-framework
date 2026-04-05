<?php

/**
 * KYG Framework for Business.
 *
 * @category   Model Manager
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);

namespace App\Modules\Chat\ModelManager;

use App\Modules\Chat\Entity\Thread;

abstract class ThreadManager implements ThreadManagerInterface
{
    public function createThread(): Thread
    {
        return new Thread();
    }
}
