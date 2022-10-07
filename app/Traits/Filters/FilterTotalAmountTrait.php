<?php

namespace App\Traits\Filters;

use Illuminate\Database\Eloquent\Builder;

trait FilterTotalAmountTrait
{
    /**
     * Filter by TotalAmount.
     *
     * @param integer $totalAmount TotalAmount.
     *
     * @return Builder
     */
    protected function totalAmount(int $totalAmount): Builder
    {
        return $this->builder->whereTotalAmount($totalAmount);
    }

    /**
     * Filter by TotalAmount.
     *
     * @param integer $totalAmount TotalAmount.
     *
     * @return Builder
     */
    protected function totalAmountGreaterThan(int $totalAmount): Builder
    {
        return $this->builder->whereTotalAmountGreaterThan($totalAmount);
    }

    /**
     * Filter by TotalAmount.
     *
     * @param integer $totalAmount TotalAmount.
     *
     * @return Builder
     */
    protected function totalAmountLessThan(int $totalAmount): Builder
    {
        return $this->builder->whereTotalAmountLessThan($totalAmount);
    }
}
