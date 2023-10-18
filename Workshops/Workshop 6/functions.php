<?php

/**
 *  Establishes a database connection and returns the connection
 */
function getConnection() {
    $connection = mysqli_connect('localhost', 'root', '', 'php_web');
    return $connection;
}

