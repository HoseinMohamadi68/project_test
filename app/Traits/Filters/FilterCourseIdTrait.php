<?php

namespace App\Traits\Filters;

use Illuminate\Database\Eloquent\Builder;

trait FilterCourseIdTrait
{
    /**
     * Filter by Course Id.
     *
     * @param integer $courseId Course Id.
     *
     * @return Builder
     */
    protected function courseId(int $courseId): Builder
    {
        return $this->builder->whereCourseId($courseId);
    }

    /**
     * Filter by Course Ids.
     *
     * @param array $courseIds Course Ids.
     *
     * @return Builder
     */
    protected function courseIds(array $courseIds): Builder
    {
        return $this->builder->whereCourseIdIn($courseIds);
    }
}
