<?php

namespace App\Traits;

use App\Models\Course;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait HasCourseIdTrait
{
    /**
     * @param Builder $builder  Builder.
     * @param array   $courseIds IDs.
     *
     * @return Builder
     */
    public function scopeWhereCourseIdIn(Builder $builder, array $courseIds): Builder
    {
        return $builder->whereIn(self::COURSE_ID, $courseIds);
    }

    /**
     * @return BelongsTo
     */
    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class, self::COURSE_ID);
    }
}
