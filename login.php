<?php
    session_start();
    if(isset($_SESSION['usuario']) && isset($_SESSION['password'])){
        session_unset();
        session_destroy();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inicio de sesion</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1 class="title">Inicio de sesion</h1>
    <h2 class="title">Ingresa a la plataforma de administradores</h2>
    <div>
        <form action="index.php" method="post">
            <label for="userAdmin">Usuario</label><br>
            <input type="text" name="userAdmin" class="textbox" required><br>
            <label for="passAdmin">Contraseña</label><br>
            <input type="password" name="passAdmin" class="textbox"required><br>
            <input type="submit" name="login" value="Iniciar sesion" class="btn">
        </form>
    </div>
        
    <br>
    <span>Si no cuenta con usuario, <a href="signup.php"> registrese</a></span>
</body>
</html>