<?php

namespace App\Filters\Contacts;

use App\Filters\Filters;
use App\Traits\Filters\FilterAmountTrait;
use App\Traits\Filters\FilterIdsTrait;
use App\Traits\Filters\FilterRatioTrait;
use App\Traits\Filters\FilterTitleTrait;

class CourseFilter extends Filters
{
    use FilterIdsTrait;
    use FilterTitleTrait;
    use FilterAmountTrait;
    use FilterRatioTrait;

    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected array $filters = [
        'ids',
        'title',
        'amount',
        'ratio'
    ];

    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected array $attributes = [
        'ids' => 'array',
        'title' => 'string',
        'amount' => 'int',
        'ratio' => 'int',
    ];
}
