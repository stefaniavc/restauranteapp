<head>
	<meta charset="utf-8">
</head>

<?php 
include 'iniciar_seccion.php';

 	if ($_REQUEST['usuario'] == '' or $_REQUEST['passnueva'] == '' or $_REQUEST['repassnueva']) {
 		$pass_nueva = $_REQUEST['passnueva'];
 		$repassnueva = $_REQUEST['repassnueva'];
 		$usuario = $_REQUEST['usuario'];

 		if ($pass_nueva == $repassnueva) {
 			mysqli_query($conexion,"UPDATE usuario SET claveUsuario='$pass_nueva' WHERE nombreUsuario='$usuario'")
 				or die ("Problemas al recuperar contraseña".mysqli_error($conexion));

 			mysqli_close($conexion);

 			echo '<script> alert("Su contraseña se ha cambiado exitosamente");</script>';
			echo '<script> window.location="../index.php"; </script>';
 		}else{
 			echo '<script> alert("Las contraseñas no coinciden");</script>';
			echo '<script> window.location="../html/cambio_pass.php"; </script>';
 		}

 		
 	}else{
 		echo '<script> alert("Por favor llene todos los campos");</script>';
 		echo '<script> window.location="../html/cambio_pass.php"; </script>';
 	}

?>