<?php

namespace App\Interfaces\Models\Contacts;

use App\Interfaces\Models\BaseModelInterface;
use App\Interfaces\Traits\HasAmountInterface;
use App\Interfaces\Traits\HasCourseIdInterface;
use App\Interfaces\Traits\HasOrderIdInterface;

interface OrderItemModelInterface extends
    BaseModelInterface,
    HasOrderIdInterface,
    HasCourseIdInterface,
    HasAmountInterface
{
    const TABLE = 'order_items';

    /**
     * @param array $attributes Attribute.
     *
     * @return OrderItemModelInterface
     */
    public static function createObject(array $attributes): OrderItemModelInterface;

    /**
     * @param array $attributes Attribute.
     *
     * @return OrderItemModelInterface
     */
    public function updateObject(array $attributes): OrderItemModelInterface;
}
