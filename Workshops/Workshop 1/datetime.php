<?php
    date_default_timezone_set('America/Mexico_City');

    $currentDate = date("d-m-Y");
    $currentTime = date("h:i:s");

    echo "<h1>Fecha y hora actual:</h1>";
    echo "<p><b>La fecha y hora actual es: $currentDate $currentTime</b></p>";
?>