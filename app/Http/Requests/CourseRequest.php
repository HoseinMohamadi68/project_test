<?php

namespace App\Http\Requests;

use App\Models\Course;

class CourseRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            Course::TITLE => sprintf(
                'string|required|unique:%s,%s,%s',
                Course::TABLE,
                Course::TITLE,
                optional($this->course)->getId()
            ),
            Course::RATIO => ['required', 'numeric', 'between:0,100'],
            Course::AMOUNT => ['numeric', 'required']
        ];
    }
}
