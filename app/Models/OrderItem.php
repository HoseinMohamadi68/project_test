<?php

namespace App\Models;

use App\Filters\Contacts\OrderItemFilter;
use App\Interfaces\Models\Contacts\OrderItemModelInterface;
use App\Traits\HasAmountTrait;
use App\Traits\HasCourseIdTrait;
use App\Traits\HasIdTrait;
use App\Traits\HasOrderIdTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends BaseModel implements OrderItemModelInterface
{
    use HasFactory;
    use HasIdTrait;
    use HasOrderIdTrait;
    use HasCourseIdTrait;
    use HasAmountTrait;


    /**
     * @var string[]
     */
    protected $fillable = [
        self::ID,
        self::ORDER_ID,
        self::COURSE_ID,
        self::AMOUNT,
    ];

    /**
     * @param Builder $builder Builder.
     * @param OrderItemFilter $filters Filters.
     *
     * @return Builder
     */
    public function scopeFilter(Builder $builder, OrderItemFilter $filters): Builder
    {
        return $filters->apply($builder);
    }

    /**
     * Create new Object.
     *
     * @param array $attributes Attribute to create an Entity.
     * @return OrderItemModelInterface
     */
    public static function createObject(array $attributes): OrderItemModelInterface
    {
        return self::create($attributes);
    }

    /**
     * Update an Object.
     *
     * @param array $attributes Attribute to update an Entity.
     * @return OrderItemModelInterface
     */
    public function updateObject(array $attributes): OrderItemModelInterface
    {
        $this->update($attributes);

        return $this;
    }
}
