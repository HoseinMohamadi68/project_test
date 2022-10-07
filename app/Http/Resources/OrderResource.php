<?php

namespace App\Http\Resources;

use App\Models\Contacts\Email;
use App\Models\Course;
use App\Models\Order;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            Order::ID => $this->getId(),
            Order::TOTAL_AMOUNT => $this->getTotalAmount(),
            Order::DISCOUNT => $this->getDiscount(),
        ];
    }
}
