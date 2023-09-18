<?php
    date_default_timezone_set('America/Mexico_City');

    $currentDateTime = date("d-m-Y h:i:s");

    $content = "<h1>Fecha y hora actual:</h1>";
    $content .= "<p><b>La fecha y hora actual es: ".$currentDateTime."</b></p>";
    
    echo $content;
?>