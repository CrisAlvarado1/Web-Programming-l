<?php
// Validate if a session exists of the user
session_start();
$user = $_SESSION['user'];

if (!$user) {
  header('Location: /Workshop%204/index.php');
}
