<?php

namespace App\Models;

use App\Filters\Contacts\CourseFilter;
use App\Interfaces\Models\Contacts\CourseInterface;
use App\Traits\HasAmountTrait;
use App\Traits\HasIdTrait;
use App\Traits\HasRatioTrait;
use App\Traits\HasTitleTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends BaseModel implements CourseInterface
{
    use HasFactory;
    use HasIdTrait;
    use HasTitleTrait;
    use HasAmountTrait;
    use HasRatioTrait;

    /**
     * @var string[]
     */
    protected $fillable = [
        self::ID,
        self::TITLE,
        self::AMOUNT,
        self::RATIO
        ];

    /**
     * @param Builder      $builder Builder.
     * @param CourseFilter $filters Filters.
     *
     * @return Builder
     */
    public function scopeFilter(Builder $builder, CourseFilter $filters): Builder
    {
        return $filters->apply($builder);
    }
    /**
     * Create new Object.
     *
     * @param array $attributes Attribute to create an Entity.
     * @return CourseInterface
     */
    public static function createObject(array $attributes): CourseInterface
    {
        return self::create($attributes);
    }

    /**
     * Update an Object.
     *
     * @param array $attributes Attribute to update an Entity.
     * @return CourseInterface
     */
    public function updateObject(array $attributes): CourseInterface
    {
        $this->update($attributes);

        return $this;
    }
}
