<?php
    if($_GET){
        include('../utils/functions.php');
        $id = $_GET['id'];

        if (deleteUser($id)) {
            header("Location: /Workshop%204/users/users.php");
        }

    } else {
        header("Location: /Workshop%204/users/users.php");
    }