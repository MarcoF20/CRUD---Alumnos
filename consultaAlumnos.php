<!DOCTYPE html>
<?php 
    require("conexion.php");
     session_start();
     if(!isset($_SESSION['usuario']) && !isset($_SESSION['password'])){
         header("refresh:3; url=login.php");
         die("La sesion ha expirado, seras redirigido al login");
     }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de alumnos</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Consulta de alumnos</h1>
    <h3>Buscar alumno</h3>
    <form action="" method="post">
        <input type="text" name="matricula" id="" class="textbox" required  placeholder="Matricula de alumno">
        <input type="submit" name = "buscar" class="btn btn__Search"  value="Buscar">
    </form> <br>
    <table>
        <form action="consultaAlumnos.php" method="post">

            <?php
                    if(isset($_POST['buscar'])){
                        $matricula = mysqli_real_escape_string($conn,$_POST['matricula']);
                        $query = "SELECT * FROM alumnos WHERE matricula = '$matricula'";
                        $result = mysqli_query($conn,$query);
                        
                        if($result->num_rows ==1){
                        $row = $result->fetch_assoc();
                        echo("
                        <tr>
                        <th>Matricula</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Fecha de Nacimiento</th>
                        <th>Carrera</th>
                        <th>Grupo</th>
                        <th>Turno</th>
                        </tr>
                        <tr>
                        <td>$row[matricula]</td>
                        <td>$row[nombre]</td>
                        <td>$row[apellidoP]</td>
                        <td>$row[apellidoM]</td>
                        <td>$row[fechaNacimiento]</td>
                        <td>$row[carrera]</td>
                        <td>$row[grupo]</td>
                        <td>$row[turno]</td>
                        <td><button name= 'eliminar'class='btn'  value=$row[matricula] type='submit'>Eliminar</button> </td>
                        </tr>
                        ");
                        if(isset($_POST['eliminar'])){
                            $query = "DELETE FROM alumnos WHERE matricula = $_POST[eliminar]";
                            mysqli_query($conn,$query); 
                            $pagina = $_SERVER['PHP_SELF'];
                            header("refresh:0.1;url=$pagina");
                        }
                    }else{
                        echo("El alumno no existe");
                    }
                }
                
                ?>
            </form>
    </table><hr>
    <table>
        <form action="consultaAlumnos.php" method="post">

            <tr>
                <th>Matricula</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Fecha de Nacimiento</th>
                <th>Carrera</th>
                <th>Grupo</th>
                <th>Turno</th>
            </tr>
            <?php
                $query = "SELECT * FROM alumnos";
                $result = mysqli_query($conn,$query);
                if($result->num_rows > 0){
                    while($row=$result->fetch_assoc()){
                        echo("
                        <tr>
                        <td>$row[matricula]</td>
                        <td>$row[nombre]</td>
                        <td>$row[apellidoP]</td>
                        <td>$row[apellidoM]</td>
                        <td>$row[fechaNacimiento]</td>
                        <td>$row[carrera]</td>
                        <td>$row[grupo]</td>
                        <td>$row[turno]</td>
                        <td><button name= 'eliminar'class='btn'  value=$row[matricula] type='submit'>Eliminar</button> </td>
                        </tr>
                        ");
                    }
                }
                if(isset($_POST['eliminar'])){
                    $query = "DELETE FROM alumnos WHERE matricula = $_POST[eliminar]";
                    mysqli_query($conn,$query); 
                    $pagina = $_SERVER['PHP_SELF'];
                    header("refresh:0.1;url=$pagina");
                }
                ?>
            </form>  
    </table>
            <?php
                if($result->num_rows==0){
                    echo"<span class='title'>No hay alumnos registrados</span>";
                }
            ?>  
    <a href="index.php"><button class="btn">Menu principal</button></a>
</body>
</html>