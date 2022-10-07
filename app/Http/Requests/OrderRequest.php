<?php

namespace App\Http\Requests;

use App\Models\Order;

class OrderRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            Order::TOTAL_AMOUNT => ['required', 'numeric'],
            Order::DISCOUNT => ['numeric', 'required']
        ];
    }
}
