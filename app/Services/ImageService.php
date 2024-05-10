<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ImageService
{
    public function singleUpload(UploadedFile $file, string $fileName, string $path): string
    {
        $filePath = 'public/' . $path;
        $extension = $file->getClientOriginalExtension();
        $name = (Str::slug($fileName) . uniqid()) . '.' . $extension;

        Storage::putFileAs($filePath, $file, $name);

        return 'storage/' . $path. '/' . $name;
    }

    public function deleteImage(string $path)
    {
        return Storage::delete($path);
    }
}
