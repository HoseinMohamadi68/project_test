<?php

namespace App\Filters\Contacts;

use App\Filters\Filters;
use App\Traits\Filters\FilterDiscountTrait;
use App\Traits\Filters\FilterIdsTrait;
use App\Traits\Filters\FilterTotalAmountTrait;

class OrderFilter extends Filters
{
    use FilterIdsTrait;
    use FilterTotalAmountTrait;
    use FilterDiscountTrait;

    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected array $filters = [
        'ids',
        'totalAmount',
        'discount'
    ];

    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected array $attributes = [
        'ids' => 'array',
        'totalAmount' => 'int',
        'discount' => 'int',
    ];
}
