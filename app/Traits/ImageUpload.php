<?php

namespace App\Traits;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait ImageUpload
{
    public function imageUpload(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : Str::random(25);

        $file = $uploadedFile->storeAs($folder, $name . '.' . $uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
    }

    public function imageDelete($folder = null, $disk = 'public', $filename = null)
    {
        Storage::disk($disk)->delete($folder . $filename);
    }

    public function getImage($request, $imageFiled, $entityName, $folderName, $numOfImages = 1)
    {
        // Get image file
        $image = $request->file($imageFiled);

        // Make a image name based on entity name and current timestamp
        $slug = Str::slug($request->input($entityName) ? $request->input($entityName) : $entityName);
        $name = $slug . '_' . $numOfImages . '_' . time();

        // Define folder path
        $folder = '/uploads/images/' . $folderName . '/' . $entityName;

        // Make a file path where image will be stored [ folder path + file name + file extension]
        $filePath = $folder . $name . '.' . $image->getClientOriginalExtension();

        // Upload image
        return $this->imageUpload($image, $folder, 'public', $name);
    }
}
