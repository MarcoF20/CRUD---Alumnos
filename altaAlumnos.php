<?php
session_start();
if (!isset($_SESSION['usuario']) && !isset($_SESSION['password'])) {
    header("refresh:3; url=login.php");
    die("La sesion ha expirado, seras redirigido al login");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta alumnos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1 style="text-align:center;">Alta de alumnos</h1>
    <div id="form-container">
        <form action="altaAlumnos.php" method="post">
            <label for="matricula">Matricula del alumno</label><br>
            <input type="text" class="textbox" name="matricula" required><br><br>
            <label for="nombreAlumno">Nombre(s) del alumno</label><br>
            <input type="text" class="textbox" name="nombreAlumno" required><br><br>
            <label for="apellidoP">Apellido paterno del alumno</label><br>
            <input type="text" class="textbox" name="apellidoP" required><br><br>
            <label for="apellidoM">Apellido materno del alumno</label><br>
            <input type="text" class="textbox" name="apellidoM" required><br><br>
            <label for="fechaN">Fecha de nacimiento del alumno</label><br>
            <input type="date" class="textbox" name="fechaN"><br><br>
            <label for="carrera">Carrera del alumno</label><br>
            <select class="textbox" name="carrera" id="">
                <option value="informatica">Licenciado en Informatica</option>
                <option value="contabilidad">Licenciado en Contaduria</option>
                <option value="admE">Licenciado en Administracion de Empresas</option>
                <option value="negI">Licenciado en Negocios Internacionales</option>
                <option value="intNeg">Licenciado en Inteligencia de los Negocios</option>
            </select><br><br>
            <label for="grupo">Grupo del alumno</label><br>
            <input type="text" class="textbox" name="grupo" id="" required><br><br>
            <label for="turno">Turno del alumno</label><br>
            <div class="select">
                <select name="turno" id="">
                    <option value="mat">Matutino</option>
                    <option value="vesp">Vespertino</option>
                </select>
            </div>
            <input type="submit" class="btn" value="Registrar alumno">
        </form>
    </div>
    <a href="index.php"><button class="btn">Menu principal</button></a>
    <?php
    require("conexion.php");
    if ($_POST) {
        $matricula = mysqli_real_escape_string($conn, $_POST['matricula']);
        $nombre = mysqli_real_escape_string($conn, $_POST['nombreAlumno']);
        $apellidoP = mysqli_real_escape_string($conn, $_POST['apellidoP']);
        $apellidoM = mysqli_real_escape_string($conn, $_POST['apellidoM']);
        $fechaN = mysqli_real_escape_string($conn, $_POST['fechaN']);
        $carrera;
        switch ($_REQUEST['carrera']) {
            case 'informatica':
                $carrera = "Licenciado en Informatica";
                break;
            case 'contabilidad':
                $carrera = "Licenciado en Contaduria";
                break;
            case 'admE':
                $carrera = "Licenciado en Administracion de Empresas";
                break;
            case 'negI':
                $carrera = "Licenciado en Negocios Internacionales";
                break;
            case 'intNeg':
                $carrera = "Licenciado en Inteligencia de Negocios";
                break;
            default:
                $carrera = null;
        }
        $grupo = mysqli_real_escape_string($conn, $_POST['grupo']);
        $turno;
        switch ($_REQUEST['turno']) {
            case 'mat':
                $turno = "Matutino";
                break;
            case 'vesp':
                $turno = "Vespertino";
                break;
            default:
                $turno = null;
        }
        $query = "INSERT INTO alumnos (matricula,nombre,apellidoP,apellidoM,fechaNacimiento,
            carrera,grupo,turno) VALUES ('$matricula','$nombre','$apellidoP','$apellidoM','$fechaN',
            '$carrera','$grupo','$turno')";

        if (mysqli_query($conn, $query) === TRUE) {
            echo ("<span class='correct'>Alumno registrado con exito</span");
        } else {
            echo ("Error al registar al alumno");
        }
        mysqli_close($conn);
    }
    ?>
</body>

</html>