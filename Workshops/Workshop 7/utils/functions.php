<?php

/**
 *  Establishes a database connection and returns the connection
 */
function getConnection()
{
  $connection = mysqli_connect('localhost', 'root', '', 'php_web');
  return $connection;
}

/**
 *  Retrieves all the provinces from the database
 */
function getProvinces()
{
  $conn = getConnection();
  $sql = "SELECT * FROM `provinces`;";

  $result = mysqli_query($conn, $sql);
  $provinces = $result->fetch_all(MYSQLI_ASSOC);
  $conn->close();

  return $provinces;
}

/**
 *  Retrieves the specific province from the database
 */
function getProvince($id)
{
  $conn = getConnection();
  $sql = "SELECT * FROM `provinces` WHERE id = $id;";

  $result = mysqli_query($conn, $sql);
  $row = $result->fetch_assoc();
  $provinceName = $row['name'];
  $conn->close();

  return $provinceName;
}

/**
 * Retrieve a specific user's information from the database by their ID.
 *
 * @param $idUser is the unique identifier of the user.
 */
function getUser($idUser)
{
  $sql = "SELECT * FROM `users` WHERE id = " . $idUser . ";";
  $conn = getConnection();

  $result = mysqli_query($conn, $sql);
  $user = $result->fetch_all(MYSQLI_ASSOC);
  $conn->close();

  return ($user) ? $user[0] : null;
}

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
