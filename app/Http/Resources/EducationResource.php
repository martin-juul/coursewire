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
            $this->mergeWhen('educationType', function () {
                return [
                    'parent' => $this->educationType->slug,
                ];
            }),
            'slug'    => $this->slug,
            'version' => $this->version,
        ];
    }
}
