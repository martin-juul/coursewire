<?php

namespace App\Nova\Concerns;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;
use kornrunner\Blurhash\Blurhash;

class StoreImageAttachment implements ShouldQueue
{
    /**
     * Store the incoming file upload.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param string $attribute
     * @param string $requestAttribute
     * @param string $disk
     * @param string $storagePath
     *
     * @return array
     */
    public function __invoke($request, $model, $attribute, $requestAttribute, $disk, $storagePath)
    {
        /** @var \Illuminate\Http\UploadedFile $file */
        $file = $request->file($requestAttribute);
        $image = imagecreatefromstring($file->getContent());
        $width = imagesx($image);
        $height = imagesy($image);

        $max_width = 20;
        if ($width > $max_width) {
            $image = imagescale($image, $max_width);
            $width = imagesx($image);
            $height = imagesy($image);
        }

        $pixels = [];
        for ($y = 0; $y < $height; ++$y) {
            $row = [];
            for ($x = 0; $x < $width; ++$x) {
                $index = imagecolorat($image, $x, $y);
                $colors = imagecolorsforindex($image, $index);

                $row[] = [$colors['red'], $colors['green'], $colors['blue']];
            }
            $pixels[] = $row;
        }

        $components_x = 4;
        $components_y = 3;
        $blurhash = Blurhash::encode($pixels, $components_x, $components_y);

        $model->blur_hash = $blurhash;
        $model->save();

        return [
            $attribute => Storage::disk($disk)->putFile($storagePath, $file),
        ];
    }
}
