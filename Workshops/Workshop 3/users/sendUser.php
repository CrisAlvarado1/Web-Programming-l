<?php
include('../utils/functions.php');

if($_POST) {
  //get each field and insert to the database
  $user['firstName'] = $_REQUEST['firstName'];
  $user['lastName'] = $_REQUEST['lastName'];
  $user['email'] = $_REQUEST['email'];
  $user['province_id'] = $_REQUEST['province'];
  $user['password'] = $_REQUEST['password'];
  $user['role'] = $_REQUEST['role'];

  if ($_POST['idUser']) {
    $user['id'] = $_REQUEST['idUser'];
    updateUser($user);
    header("Location: /Workshop%203/users/users.php");
  }
  elseif (saveUser($user)) {
    header("Location: /Workshop%203/users/users.php");
  } else {
    header("Location: /Workshop%203/index.php?error=true");
  }
}