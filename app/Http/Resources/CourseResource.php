<?php

namespace App\Http\Resources;

use App\Models\Contacts\Email;
use App\Models\Course;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
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
            Course::ID => $this->getId(),
            Course::TITLE => $this->getTitle(),
            Course::AMOUNT => $this->getAmount(),
            Course::RATIO => $this->getRatio(),
        ];
    }
}
