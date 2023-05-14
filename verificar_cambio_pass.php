<?php 

include 'iniciar_seccion.php';

	if(isset($_POST['recuperar'])){
		$usuario = $_POST['user'];
		$pregunta = $_POST['preguntaSecreta'];
		$respuesta = $_POST['respuesta_preg'];
		$log = mysqli_query($conexion,"SELECT * FROM usuario WHERE nombreUsuario='$usuario' AND preguntaSeguridad='$pregunta' AND respuestaPreguntaSecreta='$respuesta' ");
			if (mysqli_num_rows($log)>0) {
				$row = mysqli_fetch_array($log);
				$_SESSION["user"] = $row['nombreUsuario']; 
				echo 'Iniciando cambio de contraseña para '.$_SESSION['user'].' <p>';
				echo '<script> window.location="../html/cambio_pass.php"; </script>';
?>

<?php

				}else{
				echo '<script> alert("Las Respuestas o Usuario son incorrectos");</script>';
				echo '<script> window.location="../html/recuperar_pass.php"; </script>';
			}
		}

?>