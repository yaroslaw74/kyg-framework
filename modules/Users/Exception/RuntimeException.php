<?php
/**
 * KYG Framework for Business.
 *
 * @category   Exception
 *
 * @version    1.0.0
 *
 * @copyright  Copyright (c) Kataev Yaroslav
 * @license    GNU General Public License version 3 or later, see LICENSE
 */
declare(strict_types=1);
namespace App\Modules\Users\Exception;

use App\Modules\Users\Contract\Exception\ExceptionInterface;

class RuntimeException extends \RuntimeException implements ExceptionInterface
{
}
