<?php

namespace App\Models;

use App\Filters\Contacts\OrderFilter;
use App\Interfaces\Models\Contacts\OrderModelInterface;
use App\Traits\HasDiscountTrait;
use App\Traits\HasIdTrait;
use App\Traits\HasTotalAmountTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends BaseModel implements OrderModelInterface
{
    use HasFactory;
    use HasIdTrait;
    use HasTotalAmountTrait;
    use HasDiscountTrait;


    /**
     * @var string[]
     */
    protected $fillable = [
        self::ID,
        self::TOTAL_AMOUNT,
        self::DISCOUNT,
    ];

    /**
     * @param Builder      $builder Builder.
     * @param OrderFilter $filters Filters.
     *
     * @return Builder
     */
    public function scopeFilter(Builder $builder, OrderFilter $filters): Builder
    {
        return $filters->apply($builder);
    }
    /**
     * Create new Object.
     *
     * @param array $attributes Attribute to create an Entity.
     * @return OrderModelInterface
     */
    public static function createObject(array $attributes): OrderModelInterface
    {
        return self::create($attributes);
    }

    /**
     * Update an Object.
     *
     * @param array $attributes Attribute to update an Entity.
     * @return OrderModelInterface
     */
    public function updateObject(array $attributes): OrderModelInterface
    {
        $this->update($attributes);

        return $this;
    }
}
