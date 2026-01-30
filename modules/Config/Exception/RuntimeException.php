<?php

namespace App\Account\Exception;

use App\Account\Contract\Exception\ExceptionInterface;

class RuntimeException extends \RuntimeException implements ExceptionInterface
{
}
