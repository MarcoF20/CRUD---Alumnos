<?php
    $host = "localhost";
    $username = "root";
    $password = "158190";
    $dbname = "pFinal";

    $conn = new mysqli($host,$username,$password,$dbname);

    if($conn->connect_errno){
        die("Error en la conexion a la base de datos");
    }
?>