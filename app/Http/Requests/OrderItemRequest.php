<?php

namespace App\Http\Requests;

use App\Models\Course;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Validation\Rule;

class OrderItemRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            OrderItem::ORDER_ID => ['required', 'numeric',Rule::exists(Order::TABLE,Order::ID)],
            OrderItem::COURSE_ID => ['required', 'numeric',Rule::exists(Course::TABLE,Course::ID)],
            OrderItem::AMOUNT => ['numeric', 'required']
        ];
    }
}
