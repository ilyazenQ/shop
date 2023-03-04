<?php

namespace App\Core\Abstraction\Entity;

use ...;

abstract class Entity
{
    public static function query()
    {
        return (new static)->newQuery();
    }

}