<?php
include('utils/functions.php');

if ($_POST) {
  //get each field and insert to the database
  $user['firstName'] = $_REQUEST['firstName'];
  $user['lastName'] = $_REQUEST['lastName'];
  $user['email'] = $_REQUEST['email'];
  $user['province_id'] = $_REQUEST['province'];
  $user['password'] = $_REQUEST['password'];
  $user['role'] = !empty($_REQUEST['role']) ? $_REQUEST['role'] : 'user';

  if (!empty($user['firstName']) && !empty($user['password'])) {
    saveUser($user);
    header("Location: /Workshop%203/index.php?status=registered");
  } else {
    header("Location: /Workshop%203/signup.php?error=true");
  }
}
