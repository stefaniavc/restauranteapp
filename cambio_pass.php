<?php
    session_start();
    include '../php/iniciar_seccion.php';
    if(isset($_SESSION['user'])){
    echo '<script> window.location="../index.php"; </script>';
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/login.css">
    <title>Recuperar Contraseña</title>
</head>
<body>
    
    <div class="logo">
        <img src="../imagenes/login/cthulhu-logo.png">
    </div>

    <div class="form form-cambiopass">

        <form action="../php/update_pass.php" method="post" class="formulario" name="form">
            <p>
                <label for="usuario" id="box_user">Verifique Usuario</label>
                <input type="text" name="usuario">
            </p>
            <p>
                <label for="pass_nueva" id="box_user">Nueva Contraseña</label>
                <input type="password" name="passnueva">
            </p> <br>

            <p>
                <label for="re_pass_nueva" id="pass">Verifica tu Contraseña</label>
                <input type="password" name="repassnueva">
            </p>

            <p>
               <input type="submit" name="recuperar" value="Cambiar Contraseña" id="ing">
            </p>
        </form>
    </div>

</body>
</html>