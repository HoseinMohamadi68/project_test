<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait HasRealPriceTrait
{
    /**
     * @param Builder $builder   Builder.
     * @param integer $realPrice Real Price.
     *
     * @return Builder
     */
    public function scopeWhereRealPriceGreaterThan(Builder $builder, int $realPrice): Builder
    {
        return $builder->where(self::REAL_PRICE, '>=', $realPrice);
    }

    /**
     * @param Builder $builder   Builder.
     * @param integer $realPrice Real Price.
     *
     * @return Builder
     */
    public function scopeWhereRealPriceLessThan(Builder $builder, int $realPrice): Builder
    {
        return $builder->where(self::REAL_PRICE, '<=', $realPrice);
    }

    /**
     * @param integer|float $realPrice RealPrice.
     * @return integer|float
     */
    public function increaseRealPrice(int|float $realPrice): int|float
    {
        $this->setRealPrice($this->getRealPrice() + $realPrice);
        $this->save();

        return $this->getRealPrice();
    }

    /**
     * @param integer|float $realPrice RealPrice.
     * @return integer|float
     */
    public function decreaseRealPrice(int|float $realPrice): int|float
    {
        /** @var float|int $realPrice */
        $realPrice = $this->getRealPrice() >= $realPrice ? $this->getRealPrice() - $realPrice : 0;

        $this->setRealPrice($realPrice);
        $this->save();

        return $this->getRealPrice();
    }
}
