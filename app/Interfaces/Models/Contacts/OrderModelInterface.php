<?php

namespace App\Interfaces\Models\Contacts;

use App\Interfaces\Models\BaseModelInterface;
use App\Interfaces\Traits\HasDiscountInterface;
use App\Interfaces\Traits\HasPhoneNumberInterface;
use App\Interfaces\Traits\HasTotalAmountInterface;
use App\Interfaces\Traits\HasTypeInterface;

interface OrderModelInterface extends
    BaseModelInterface,
    HasTotalAmountInterface,
    HasDiscountInterface
{
    const TABLE = 'orders';

    /**
     * @param array $attributes Attribute.
     *
     * @return OrderModelInterface
     */
    public static function createObject(array $attributes): OrderModelInterface;

    /**
     * @param array $attributes Attribute.
     *
     * @return OrderModelInterface
     */
    public function updateObject(array $attributes): OrderModelInterface;
}
