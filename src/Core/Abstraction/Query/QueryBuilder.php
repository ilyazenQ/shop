<?php

namespace App\Core\Abstraction\Query;

abstract class QueryBuilder
{
    use FiltersQuery;
    use SortsQuery;
    use AddsIncludesToQuery;
    use AddsFieldsToQuery;
    use ForwardsCalls;

    ...
}