<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\Education
 */
class EducationResource extends JsonResource
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
            'title'    => $this->title,
            'overview' => $this->overview,
            'about'    => $this->about,
            'created'  => $this->created_at,
            'updated'  => $this->updated_at,
        ];
    }
}
