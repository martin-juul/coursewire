<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\EducationType
 */
class EducationTypeResource extends JsonResource
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
            'title'      => $this->title,
            'short_name' => $this->short_name,
            'slug'       => $this->slug,
            'about'      => $this->about,
            'image'      => $this->getImageUrl(),
            'created'    => $this->created_at,
            'updated'    => $this->updated_at,
        ];
    }
}
