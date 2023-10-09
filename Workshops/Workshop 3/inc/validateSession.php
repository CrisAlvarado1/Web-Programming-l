<?php
    session_start();
    $user = $_SESSION['user'];
  
    if (!$user) {
      header('Location: /Workshop%203/index.php');
    }