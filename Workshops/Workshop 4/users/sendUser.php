<?php
  include('../utils/functions.php');

  if ($_POST && $_REQUEST['firstName'] && $_REQUEST['password'] && $_REQUEST['role']) {
    //get each field and insert to the database
    $user['firstName'] = $_REQUEST['firstName'];
    $user['lastName'] = $_REQUEST['lastName'];
    $user['email'] = $_REQUEST['email'];
    $user['province_id'] = $_REQUEST['province'];
    $user['password'] = $_REQUEST['password'];
    $user['role'] = $_REQUEST['role'];

    // If the request brings the id, it means that it is being edited.
    if ($_REQUEST['idUser']) {
      $user['id'] = $_REQUEST['idUser'];
      updateUser($user);
      header("Location: /Workshop%204/users/users.php");
    } elseif (saveUser($user)) {
      header("Location: /Workshop%204/users/users.php");
    } else {
      header("Location: /Workshop%204/users.php?error=true");
    }
  } else {
    header("Location: /Workshop%204/users.php?error=true");
  }
