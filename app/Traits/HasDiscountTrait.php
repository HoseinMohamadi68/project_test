<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasDiscountTrait
{
    /**
     * @param Builder $builder   Builder.
     * @param integer $discount Discount.
     *
     * @return Builder
     */
    public function scopeWhereDiscountGreaterThan(Builder $builder, int $discount): Builder
    {
        return $builder->where(self::DISCOUNT, '>=', $discount);
    }

    /**
     * @param Builder $builder   Builder.
     * @param integer $discount Discount.
     *
     * @return Builder
     */
    public function scopeWhereDiscountLessThan(Builder $builder, int $discount): Builder
    {
        return $builder->where(self::DISCOUNT, '<=', $discount);
    }

    /**
     * @param Builder $builder   Builder.
     * @param integer $discount Discount.
     *
     * @return Builder
     */
    public function scopeWhereDiscountIs(Builder $builder, int $discount): Builder
    {
        return $builder->where(self::DISCOUNT, $discount);
    }
}
