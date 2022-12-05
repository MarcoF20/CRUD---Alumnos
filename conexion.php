<?php
    require("DB_CREDENTIALS.php");
    $conn = new mysqli($SERVER,$USERNAME,$PASSWORD,$DATABASE);

    if($conn->connect_errno){
        die("Error en la conexion a la base de datos");
    }
?>