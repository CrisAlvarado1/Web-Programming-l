<?php
if ($_GET) {
    include_once('../utils/database.php');
    include_once('../utils/functions.php');
    $id = $_GET['id'];

    if ($id) {
        $database = new databaseManager();
        $relativePathImage = $database->getUserPathImage($id);

        if ($database->deleteUser($id)) {
            $database->closeConnection();
            deleteImage($relativePathImage);
            header("Location: /Workshop%207/users/users.php");
        } else {
            header("Location: /Workshop%207/users/users.php?error=true");
        }
    }
} else {
    header("Location: /Workshop%207/users/users.php");
}
