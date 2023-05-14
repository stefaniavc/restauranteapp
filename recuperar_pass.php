<?php
    session_start();
    include '../php/iniciar_seccion.php';
    if(isset($_SESSION['user'])){
    echo '<script> window.location="inicio.php"; </script>';
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
        <form action="../php/verificar_cambio_pass.php" method="post" class="formulario">
            <p>
                <label for="usuario" id="box_user">Escribe Tu Usuario</label>
                <input type="text" name="user">
            </p> <br>

            <p>
                <label for="preguntaSecreta">Elige tu pregunta secreta</label> <br>
                <select name="preguntaSecreta" class="listaPre">
                    <option class="option">Nombre de tu primer mascota</option>
                    <option class="option">Cual es tu gato gay favorito</option>
                    <option class="option">Equipo deportivo favorito</option>
                    <option class="option">Pelicula favorita</option>
                    <option class="option">Apellido de tu pareja</option>
                </select>
            </p>

            <p>
                <label for="respuesta_preg" id="pass">Respuesta de pregunta secreta</label>
                <input type="password" name="respuesta_preg">
            </p>

            <p>
               <input type="submit" name="recuperar" value="Verificar Datos" id="ing">
            </p>
        </form>
    </div>

</body>
</html>