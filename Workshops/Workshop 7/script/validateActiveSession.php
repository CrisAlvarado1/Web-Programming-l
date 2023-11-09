<?php
if ($argc == 2) {
    if (is_numeric($argv[1])) {
        date_default_timezone_set('America/Mexico_City');
        $dateTime = new DateTime();
        // Get the hours to be subtracted
        $hours = $argv[1];

        // Subtract the hours
        $dateTime->sub(new DateInterval("PT{$hours}H"));

        $resultDateTime = $dateTime->format('Y-m-d H:i:s');
        // If the last_login_datetime of the last login is less than the date resulting from the subtraction, pass to inactive
        $sql = "UPDATE `users` SET `status` = 'inactive' 
            WHERE last_login_datetime < '$resultDateTime' AND `status` = 'active';";
        $conn = mysqli_connect('localhost', 'root', '', 'php_web');

        if (mysqli_query($conn, $sql)) {
            echo "Todos los usuarios que no cumplían con el tiempo minimo se han desactivado";
        } else {
            echo "Ha ocurrido un error intentalo de nuevo" . mysqli_error($conn);;
        }
        $conn->close();
    } else {
        echo "Bad Arguments...\n";
        exit;
    }
} else {
    echo "Arguments missing...\n";
    exit;
}
