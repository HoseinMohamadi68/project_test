<?php

namespace App\Interfaces\Traits;

use Illuminate\Database\Eloquent\Builder;

interface HasFaxInterface
{
    /**
     * @param Builder $builder Builder.
     * @param string  $fax     Order.
     *
     * @return Builder
     */
    public function scopeWhereFaxLike(Builder $builder, string $fax): Builder;
}
