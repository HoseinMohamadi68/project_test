<?php

namespace App\Http\Resources;

use App\Models\OrderItem;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
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
            OrderItem::ID => $this->getId(),
            OrderItem::ORDER_ID => $this->getOrderId(),
            OrderItem::COURSE_ID => $this->getCourseId(),
            OrderItem::AMOUNT => $this->getAmount(),

            'order' => $this->whenLoaded(
                'order',
                function () {
                    return new OrderResource($this->order);
                }
            ),
            'course' => $this->whenLoaded(
                'course',
                function () {
                    return new CourseResource($this->course);
                }
            ),

        ];
    }
}
