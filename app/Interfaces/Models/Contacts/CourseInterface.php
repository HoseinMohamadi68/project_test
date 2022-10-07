<?php

namespace App\Interfaces\Models\Contacts;

use App\Interfaces\Models\BaseModelInterface;
use App\Interfaces\Traits\HasAmountInterface;
use App\Interfaces\Traits\HasRatioInterface;
use App\Interfaces\Traits\HasTitleInterface;

interface CourseInterface extends
    BaseModelInterface,
    HasTitleInterface,
    HasAmountInterface,
    HasRatioInterface
{
    const TABLE = 'courses';

    /**
     * Create new Object.
     *
     * @param array $attributes Attribute.
     *
     * @return CourseInterface
     */
    public static function createObject(array $attributes): CourseInterface;

    /**
     * Update an Object.
     *
     * @param array $attributes Attribute.
     *
     * @return CourseInterface
     */
    public function updateObject(array $attributes): CourseInterface;
}
