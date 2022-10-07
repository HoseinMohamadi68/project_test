<?php

namespace App\Filters\Contacts;

use App\Filters\Filters;
use App\Traits\Filters\FilterAmountTrait;
use App\Traits\Filters\FilterCourseIdTrait;
use App\Traits\Filters\FilterIdsTrait;
use App\Traits\Filters\FilterOrderIdTrait;

class OrderItemFilter extends Filters
{
    use FilterIdsTrait;
    use FilterOrderIdTrait;
    use FilterCourseIdTrait;
    use FilterAmountTrait;

    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected array $filters = [
        'ids',
        'orderId',
        'courseId',
        'amount',
    ];

    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected array $attributes = [
        'ids' => 'array',
        'orderId' => 'array',
        'courseId' => 'array',
        'amount' => 'int',
    ];
}
