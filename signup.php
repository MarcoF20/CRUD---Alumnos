<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de administradores</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1 class="title">Alta de administradores</h1>
    <h3 class="title">Llena todos los campos del formulario</h3>
    <div>
        <form action="signup.php" method="post">
            <label for="nombreAdmin">Nombre(s) del admistrador</label><br>
            <input type="text" name="nombreAdmin" class="textbox" required><br>
            <label for="apellidoAdmin">Apellidos del administrador</label><br>
            <input type="text" name="apellidoAdmin" class="textbox" required><br>
            <label for="userAdmin">Usuario del administrador</label><br>
            <input type="text" name="userAdmin" class="textbox" required><br>
            <label for="passAdmin">Contraseña del administrador</label><br>
            <input type="password" name="passAdmin" class="textbox" required><br>

            <input type="submit" value="Registrar" class="btn">
        </form>
    </div>
    <div>
        <a href="login.php"><button class="btn">Ir al inicio de sesion</button></a>
    </div>
    <?php
        if ($_POST) {
            require("conexion.php");
            $nombre = mysqli_real_escape_string($conn, $_POST['nombreAdmin']);
            $apellido = mysqli_real_escape_string($conn, $_POST['apellidoAdmin']);
            $user = mysqli_real_escape_string($conn, $_POST['userAdmin']);
            $pass = mysqli_real_escape_string($conn, $_POST['passAdmin']);
            # $cryptedPass =crypt($pass,null);
            $query = "INSERT INTO administradores  
                    (nombre,apellido,username,password)
                    VALUES ('$nombre','$apellido','$user','$pass')";

            if (mysqli_query($conn, $query) === TRUE) {
                echo ("<br> <span class='correct'>Registrado con exito</span>");
            } else {
                echo ("<br> Hubo un error con el registro");
            }
            mysqli_close($conn);
        }
    ?>
</body>

</html>