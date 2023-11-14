<?php

/**
 * Moves an uploaded image file to a specified target directory.
 *
 * @param string $tmpNameImage The temporary file name of the uploaded image.
 * @param string $targetFile   The target path where the image file will be moved.
 * @return string|bool Returns The relative URL if successful, otherwise returns false.
 */
function moveImage($tmpNameImage, $targetFile)
{
  $flag = move_uploaded_file($tmpNameImage, $targetFile);
  $relativeUrl = $targetFile;

  if ($flag) {
    return $relativeUrl;
  } else {
    return $flag;
  }
}

/**
 * Delete an image file from the "pics" folder.
 *
 * @param string $imagePath The path to the image file to be deleted.
 *
 * @return bool True if the image was successfully deleted or if the file does not exist, return false.
 */
function deleteImage($imagePath)
{
  $imagePath = "../" . $imagePath;

  if (file_exists($imagePath)) {
    unlink($imagePath);
    return true;
  } else {
    return true;
  }
}
