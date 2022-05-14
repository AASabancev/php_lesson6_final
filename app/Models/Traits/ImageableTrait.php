<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

trait ImageableTrait
{
    private $path = 'uploads';

    public function saveImage($image)
    {
        $filename = Str::random() . '.' . $image->extension();
        $filepath = $this->getUploadPath($filename);

        $img = Image::make($image->path());
        $img->resize(400, 300, function ($const) {
            $const->aspectRatio();
        })->save($filepath);

        if (file_exists($filepath)) {
            $this->deleteImageFile();
            $this->update(['image_url' => $this->getFileUrl($filename)]);
        }
    }

    private function getUploadPath($filename)
    {
        $path = Storage::disk('public')->path($this->path);
        Storage::disk('public')->makeDirectory($this->path);
        return $path . DIRECTORY_SEPARATOR . $filename;
    }

    public function deleteImageFile()
    {
        if (empty($this->image_url)) {
            return;
        }
        $withoutStorage = str_replace('/storage/', '', $this->image_url);
        $filepath = Storage::disk('public')->path($withoutStorage);

        if (file_exists($filepath)) {
            unlink($filepath);
        }
    }

    private function getFileUrl($filename)
    {
        $path = '/storage/' . $this->path . '/' . $filename;
        return $path;
    }
}
