<?php

namespace App\Traits;

use App\Models\Order;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasOrderIdTrait
{
    /**
     * @param Builder $builder  Builder.
     * @param array   $orderIds IDs.
     *
     * @return Builder
     */
    public function scopeWhereOrderIdIn(Builder $builder, array $orderIds): Builder
    {
        return $builder->whereIn(self::ORDER_ID, $orderIds);
    }

    /**
     * @return BelongsTo
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, self::ORDER_ID);
    }
}
