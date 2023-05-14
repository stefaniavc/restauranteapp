<?php
    session_start();
    include 'php/iniciar_seccion.php';
    if(isset($_SESSION['user'])){
    echo '<script> window.location="html/inicio.php"; </script>';
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="imagenes/login/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/login.css">
    <title>Login</title>
</head>
<body>
    
    <div class="logo">
        <img src="imagenes/login/cthulhu-logo.png">
    </div>

    <div class="form">
        <form action="php/verificar_login.php" method="post">
            <p>
                <label for="usuario" id="box_user">Usuario</label>
                <input type="text" name="user">
            </p>

            <p>
                <label for="pass" id="pass">Contraseña</label>
                <input type="password" name="pass">
            </p>

            <p>
               <input type="submit" name="entrar" value="Ingresar" id="ing">
            </p><br>

            <a href="html/recuperar_pass.php">¿Haz olvidado tu contraseña?</a>
        </form>
    </div>

</body>
</html>