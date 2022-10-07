<?php

namespace App\Interfaces\Traits;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

interface HasCourseIdInterface
{
    const COURSE_ID = 'course_id';

    /**
     * @param Builder $builder             Builder.
     * @param array   $courseIds IDs.
     *
     * @return Builder
     */
    public function scopeWhereCourseIdIn(Builder $builder, array $courseIds): Builder;

    /**
     * @return BelongsTo
     */
    public function course(): BelongsTo;
}
