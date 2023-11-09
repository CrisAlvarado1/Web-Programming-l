<?php
include_once('../inc/validateSession.php');
if ($_GET) {
    include_once('../utils/database.php');
    include_once('../utils/functions.php');
    $id = $_GET['id'];

    $database = new databaseManager();

    if ($database->deleteUser($id)) {
        $database->closeConnection();
        header("Location: /Workshop%207/users/users.php");
    } else {
        header("Location: /Workshop%207/users/users.php?error=true");
    }
} else {
    header("Location: /Workshop%207/users/users.php");
}
