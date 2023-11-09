<?php
include_once('../utils/database.php');
include_once('../utils/functions.php');

if ($_POST && $_REQUEST['firstName'] && $_REQUEST['password'] && $_REQUEST['role']) {
  //get each field and insert to the database
  $user['firstName'] = $_REQUEST['firstName'];
  $user['lastName'] = $_REQUEST['lastName'];
  $user['email'] = $_REQUEST['email'];
  $user['province_id'] = $_REQUEST['province'];
  $user['password'] = $_REQUEST['password'];
  $user['role'] = $_REQUEST['role'];

  if (isset($_FILES["profilePicture"]) && $_FILES["profilePicture"]["error"] == 0) {

    // Manipulates the image
    $targetDir = "../pics/"; // Directory where uploaded files will be stored
    $targetFile = $targetDir . basename($_FILES["profilePicture"]["name"]);

    if (file_exists($targetFile)) {
      // If the file already exist change the name to: $nameuser + $filename.extension
      $originalFileName = $_FILES["profilePicture"]["name"];
      $ext = pathinfo($originalFileName, PATHINFO_EXTENSION);
      $targetFile = $targetDir . $user['firstName'] . '_' . $originalFileName;
      $user['urlImage'] = "pics/" . basename(moveImage($_FILES["profilePicture"]["tmp_name"], $targetFile));
    } else {
      $user['urlImage'] = "pics/" . basename(moveImage($_FILES["profilePicture"]["tmp_name"], $targetFile));
    }
  } else {
    $user['urlImage'] = "";
  }
  print_r($user);
  $database = new databaseManager();

  // If the request brings the id, it means that it is being edited.
  if ($_REQUEST['idUser']) {
    $user['id'] = $_REQUEST['idUser'];
    $database->updateUser($user);
    $database->closeConnection();
    header("Location: /Workshop%207/users/users.php");
  } elseif ($database->saveUser($user)) {
    header("Location: /Workshop%207/users/users.php");
  } else {
    header("Location: /Workshop%207/users.php?error=true");
  }
} else {
  header("Location: /Workshop%207/users.php?error=true");
}
