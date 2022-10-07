<?php

namespace App\Traits\Filters;

use Illuminate\Database\Eloquent\Builder;

trait FilterDiscountTrait
{
    /**
     * Filter by Discount.
     *
     * @param integer $discount Discount.
     *
     * @return Builder
     */
    protected function discount(int $discount): Builder
    {
        return $this->builder->whereDiscount($discount);
    }

    /**
     * Filter by Discount.
     *
     * @param integer $discount Discount.
     *
     * @return Builder
     */
    protected function discountGreaterThan(int $discount): Builder
    {
        return $this->builder->whereDiscountGreaterThan($discount);
    }

    /**
     * Filter by Discount.
     *
     * @param integer $discount Discount.
     *
     * @return Builder
     */
    protected function discountLessThan(int $discount): Builder
    {
        return $this->builder->whereDiscountLessThan($discount);
    }
}
