<?php

namespace App\Http\Resources;

use App\Services\Markdown;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\StudentType
 */
class StudentType extends JsonResource
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
            'title'       => $this->title,
            'slug'        => $this->slug,
            'overview'    => $this->overview,
            'description' => $this->description ? app(Markdown::class)->text($this->description) : null,
        ];
    }
}
