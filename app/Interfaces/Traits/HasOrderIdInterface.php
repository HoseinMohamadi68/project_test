<?php

namespace App\Interfaces\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasOrderIdInterface
{
    const ORDER_ID = 'order_id';

    /**
     * @param Builder $builder             Builder.
     * @param array   $orderIds IDs.
     *
     * @return Builder
     */
    public function scopeWhereOrderIdIn(Builder $builder, array $orderIds): Builder;

    /**
     * @return BelongsTo
     */
    public function order(): BelongsTo;
}
