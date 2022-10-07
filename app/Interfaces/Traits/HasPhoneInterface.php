<?php

namespace App\Interfaces\Traits;

use Illuminate\Database\Eloquent\Builder;

interface HasPhoneInterface
{
    /**
     * @param Builder $builder Builder.
     * @param string  $phone   Order.
     *
     * @return Builder
     */
    public function scopeWherePhoneLike(Builder $builder, string $phone): Builder;
}
