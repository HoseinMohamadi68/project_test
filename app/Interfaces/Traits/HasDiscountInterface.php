<?php

namespace App\Interfaces\Traits;

use Illuminate\Database\Eloquent\Builder;

interface HasDiscountInterface
{
    const DISCOUNT = 'discount';

    /**
     * @param Builder $builder   Builder.
     * @param integer $discount  Discount.
     *
     * @return Builder
     */
    public function scopeWhereDiscountGreaterThan(Builder $builder, int $discount): Builder;

    /**
     * @param Builder $builder   Builder.
     * @param integer $discount  Discount.
     *
     * @return Builder
     */
    public function scopeWhereDiscountLessThan(Builder $builder, int $discount): Builder;

    /**
     * @param Builder $builder   Builder.
     * @param integer $discount  Discount.
     *
     * @return Builder
     */
    public function scopeWhereDiscountIs(Builder $builder, int $discount): Builder;
}
