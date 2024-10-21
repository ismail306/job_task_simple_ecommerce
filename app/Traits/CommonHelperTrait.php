<?php

namespace App\Traits;

use Intervention\Image\Facades\Image;


trait CommonHelperTrait
{
    public function storeImage($path, $image)
    {
        // Get the original name of the image
        $originalname = $image->getClientOriginalName();

        // Create a unique filename
        $filename = date('Y-m-d') . '_' . time() . '_' . $originalname;

        // Resize the image
        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(512, 512);

        // Define the full storage path
        $fullPath = public_path($path);

        // Create the directory if it doesn't exist
        if (!file_exists($fullPath)) {
            mkdir($fullPath, 0755, true);
        }

        // Save the resized image to the path
        $image_resize->save($fullPath . '/' . $filename);

        // Return the filename
        return $filename;
    }


    public function UpdateImage($path, $image, $oldImage)
    {
        $oldImagePath = public_path($path . '/' . $oldImage);

        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }

        $originalname = $image->getClientOriginalName();

        $filename = date('Y-m-d') . '_' . time() . '_' . $originalname;

        $image_resize = Image::make($image->getRealPath());
        $image_resize->resize(512, 512);

        $fullPath = public_path($path);

        if (!file_exists($fullPath)) {
            mkdir($fullPath, 0755, true);
        }

        $image_resize->save($fullPath . '/' . $filename);

        return $filename;
    }
}
