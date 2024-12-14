<?php

namespace App\Traits;

trait FileTraits
{
  public function uploadImage($file, $path)
  {
    if ($file) {

      $imageName = time() . '.' . $file->getClientOriginalExtension();
      $file->move(public_path($path), $imageName);
      return $path . '/' . $imageName;
    }
    return null;
  }

  function image_path($imagePath)
  {
    return url($imagePath);
  }

  function deleteImage($imageUrl)
  {
    if (!empty($imageUrl)) {
      $oldImage = public_path($imageUrl);
      if (file_exists($oldImage)) {
        unlink($oldImage);
      }
    }
  }
}
