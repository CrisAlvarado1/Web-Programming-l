<?php
require_once('utils/database.php');

if ($_POST) {
  $username = $_REQUEST['username'];
  $password = $_REQUEST['password'];

  $database = new databaseManager();
  $user = $database->authenticate($username, $password);

  if ($user) {
    session_start();
    $database->setLoginDateTime($user['id']);
    $_SESSION['user'] = $user;
    $database->closeConnection();
    header('Location: dashboard.php');
  } else {
    $database->closeConnection();
    header('Location: index.php?status=login');
  }
}
