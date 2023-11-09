<?php
include_once('utils/functions.php');
include_once('utils/database.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_FILES["profilePicture"]) && $_FILES["profilePicture"]["error"] == 0) {
    // Get each field and insert to the database
    $user['firstName'] = $_REQUEST['firstName'];
    $user['lastName'] = $_REQUEST['lastName'];
    $user['email'] = $_REQUEST['email'];
    $user['province_id'] = $_REQUEST['province'];
    $user['password'] = $_REQUEST['password'];
    $user['role'] = !empty($_REQUEST['role']) ? $_REQUEST['role'] : 'user';

    // Manipulates the image
    $targetDir = "pics/"; // Directory where uploaded files will be stored
    $targetFile = $targetDir . basename($_FILES["profilePicture"]["name"]);

    if (file_exists($targetFile)) {
      // If the file already exist change the name to: $nameuser + $filename.extension
      $originalFileName = $_FILES["profilePicture"]["name"];
      $ext = pathinfo($originalFileName, PATHINFO_EXTENSION);
      $targetFile = $targetDir . $user['firstName'] . '_' . $originalFileName;
      $user['urlImage'] = moveImage($_FILES["profilePicture"]["tmp_name"], $targetFile);
    } else {
      $user['urlImage'] = moveImage($_FILES["profilePicture"]["tmp_name"], $targetFile);
    }

    if (!empty($user['firstName']) && !empty($user['password']) && $user['urlImage'] !== false) {
      // Instance the class of the database
      $database = new databaseManager();
      $database->saveUser($user);
      $database->closeConnection();
      header("Location: /Workshop%207/index.php?status=registered");
    } else {
      header("Location: /Workshop%207/signup.php?error=true");
    }
  } else {
    header("Location: /Workshop%207/signup.php?error=image");
  }
} else {
  header("Location: /Workshop%207/signup.php?error=true");
}
