<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasPriceTrait
{
    /**
     * @param Builder $builder Builder.
     * @param integer $price   Price.
     *
     * @return Builder
     */
    public function scopeWherePriceGreaterThan(Builder $builder, int $price): Builder
    {
        return $builder->where(self::PRICE, '>=', $price);
    }

    /**
     * @param Builder $builder Builder.
     * @param integer $price   Price.
     *
     * @return Builder
     */
    public function scopeWherePriceLessThan(Builder $builder, int $price): Builder
    {
        return $builder->where(self::PRICE, '<=', $price);
    }

}
