<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\Course
 */
class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request)
    {
        return [
            'title'     => $this->title,
            'course_no' => $this->course_no,
            'overview'  => $this->overview,
            'about'     => $this->about,
            'duration'  => $this->whenPivotLoaded('course_semester', function () {
                return $this->pivot->duration;
            }),
        ];
    }
}
