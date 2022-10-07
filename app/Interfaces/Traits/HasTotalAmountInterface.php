<?php

namespace App\Interfaces\Traits;

use Illuminate\Database\Eloquent\Builder;

interface HasTotalAmountInterface
{
    const TOTAL_AMOUNT = 'total_amount';

    /**
     * @param Builder $builder   Builder.
     * @param integer $totalAmount Total Amount.
     *
     * @return Builder
     */
    public function scopeWhereTotalAmountGreaterThan(Builder $builder, int $totalAmount): Builder;

    /**
     * @param Builder $builder   Builder.
     * @param integer $totalAmount Total Amount.
     *
     * @return Builder
     */
    public function scopeWhereTotalAmountLessThan(Builder $builder, int $totalAmount): Builder;

    /**
     * @param Builder $builder   Builder.
     * @param integer $totalAmount Total Amount.
     *
     * @return Builder
     */
    public function scopeWhereTotalAmountIs(Builder $builder, int $totalAmount): Builder;
}
