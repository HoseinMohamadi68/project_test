<?php

namespace App\Interfaces\Traits;

use Illuminate\Database\Eloquent\Builder;

interface HasPriceInterface
{
    const PRICE = 'price';

    /**
     * @param Builder $builder Builder.
     * @param integer $price   Price.
     *
     * @return Builder
     */
    public function scopeWherePriceGreaterThan(Builder $builder, int $price): Builder;

    /**
     * @param Builder $builder Builder.
     * @param integer $price   Price.
     *
     * @return Builder
     */
    public function scopeWherePriceLessThan(Builder $builder, int $price): Builder;
}
