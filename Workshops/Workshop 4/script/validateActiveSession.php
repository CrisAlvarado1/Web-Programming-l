<?php
if ($argc == 2) {
    if (is_numeric($argv[1])) {
        include('../utils/functions.php');

        date_default_timezone_set('America/Mexico_City');
        $dateTime = new DateTime();
        // Get the hours to be subtracted
        $hours = $argv[1];
        // Subtract the hours
        $dateTime->sub(new DateInterval("PT{$hours}H"));
        // Format the resulting date and time in the same variable
        $resultDateTime = $dateTime->format('Y-m-d H:i:s');

        $sql = "UPDATE `users` SET `status` = 'inactive' 
            WHERE last_login_datetime < '$resultDateTime' AND `status` = 'active';";
        $conn = getConnection();

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
