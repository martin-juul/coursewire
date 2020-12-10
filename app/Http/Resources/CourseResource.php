<?php
declare(strict_types=1);

namespace App\Http\Resources;

use App\Services\Markdown;
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
            'overview'  => $this->about ? app(Markdown::class)->text($this->overview) : null,
            'about'     => $this->about ? app(Markdown::class)->text($this->about) : null,
            'duration'  => $this->whenPivotLoaded('course_semester', function () {
                return $this->pivot->duration;
            }),
        ];
    }
}
