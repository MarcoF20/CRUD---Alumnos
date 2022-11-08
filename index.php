<?php
    require("conexion.php");
    if($_POST){
        
        // serve the page normally.
        $user =  $_POST['userAdmin'];
        $pass = $_POST['passAdmin'];
        $escapedUser= mysqli_real_escape_string($conn,$user);
        $escapedPass = mysqli_real_escape_string($conn,$pass);
        
        
        $query = "SELECT * FROM administradores  WHERE username = '$escapedUser' AND password = '$escapedPass'";
        $result = mysqli_query($conn,$query);
        
        if($result->num_rows > 0){
            session_start();
            $_SESSION['usuario'] = $escapedUser;
            $_SESSION['password'] = $escapedPass;
            while($row = $result->fetch_assoc()){
                echo("Bienvenido: $row[username]");
                echo(
                    "
                     <a href='altaAlumnos.php'><button>Alta de usuarios</button></a><br>
                     <a href='consultaAlumnos.php'><button>Consulta de usuarios</button></a><br>
                    "
                );
            }
        mysqli_close($conn);
        }else{
            echo("<script>document.location.href = 'login_failed.php'</script>");
        }
    }else{
        session_start();
        if(!isset($_SESSION['usuario']) && !isset($_SESSION['password'])){
            header("refresh:3; url=login.php");
            die("La sesion ha expirado, seras redirigido al login");
        }else{
            $user =  $_SESSION['usuario'];
            $pass = $_SESSION['password'];
            $escapedUser= mysqli_real_escape_string($conn,$user);
            $escapedPass = mysqli_real_escape_string($conn,$pass);
            
            
            $query = "SELECT * FROM administradores  WHERE username = '$escapedUser' AND password = '$escapedPass'";
            $result = mysqli_query($conn,$query);
            
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    echo("<h2 class='title'>Bienvenido: $row[username]</h2><br>");
                    echo(
                        "
                         <a href='altaAlumnos.php'><button class='btn' >Alta de alumnos</button></a><br>
                         <a href='consultaAlumnos.php'><button class='btn' >Consulta de alumnos</button></a><br>
                        "
                    );
                }
            }
            mysqli_close($conn);
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plataforma de administradores</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>    
    <a href="login.php"><button name="logout" class="btn"  type="submit">Cerrar sesion</button></a>
  <div id="imagen">
      <img src="https://www.technoloader.com/blog/wp-content/uploads/2020/07/Hire-a-Blockchain-Developer.gif" alt="">
  </div>  
    <?php
        if(isset($_POST['logout'])){
            header("url=login.php");
        }
    ?>
</body>
</html>