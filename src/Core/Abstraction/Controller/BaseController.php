<?php

namespace App\Core\Abstraction\Controller;

use ...;
abstract class BaseController
{
    public function json(mixed $data,
                         int   $status = 200,
                         array $headers = [],
                         array $context = []): JsonResponse;
}