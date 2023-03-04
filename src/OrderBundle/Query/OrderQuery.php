<?php

namespace Query;

use App\Core\Abstraction\Query\QueryBuilder;
use Entity\OrderEntity;

class OrderQuery extends QueryBuilder
{
    public function __construct()
    {
        $query = OrderEntity::query();
    }
}