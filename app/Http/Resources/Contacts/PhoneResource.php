<?php

namespace App\Http\Resources\Contacts;

use App\Models\Contacts\Order;
use Illuminate\Http\Resources\Json\JsonResource;

class PhoneResource extends JsonResource
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
            Order::TYPE => $this->getType(),
            Order::NUMBER => $this->getNumber(),
        ];
    }
}
