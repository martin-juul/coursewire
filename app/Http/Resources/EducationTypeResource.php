<?php
declare(strict_types=1);

namespace App\Http\Resources;

use App\Services\Markdown;
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
            'about'      => $this->about ? app(Markdown::class)->text($this->about) : null,
            'blur_hash'  => $this->blur_hash,
            'image'      => $this->getImageUrl(),
            'created'    => $this->created_at,
            'updated'    => $this->updated_at,
        ];
    }
}
