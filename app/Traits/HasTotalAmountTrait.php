<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasTotalAmountTrait
{
    /**
     * @param Builder $builder   Builder.
     * @param integer $totalAmount Total Amount.
     *
     * @return Builder
     */
    public function scopeWhereTotalAmountGreaterThan(Builder $builder, int $totalAmount): Builder
    {
        return $builder->where(self::TOTAL_AMOUNT, '>=', $totalAmount);
    }

    /**
     * @param Builder $builder   Builder.
     * @param integer $totalAmount Total Amount.
     *
     * @return Builder
     */
    public function scopeWhereTotalAmountLessThan(Builder $builder, int $totalAmount): Builder
    {
        return $builder->where(self::TOTAL_AMOUNT, '<=', $totalAmount);
    }

    /**
     * @param Builder $builder   Builder.
     * @param integer $totalAmount Total Amount.
     *
     * @return Builder
     */
    public function scopeWhereTotalAmountIs(Builder $builder, int $totalAmount): Builder
    {
        return $builder->where(self::TOTAL_AMOUNT, $totalAmount);
    }
}
