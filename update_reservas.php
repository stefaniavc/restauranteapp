<head>
	<meta charset="utf-8">
</head>

<?php 
include 'iniciar_seccion.php';

 	 	$idReserva = $_REQUEST['idReserva'];
 	 	$fechaReserva = $_REQUEST['fechaReserva'];
 	 	$horaReserva = $_REQUEST['horaReserva'];
 	 	$mesaReserva = $_REQUEST['mesaReserva'];
 	 	$numeroPersonas = $_REQUEST['numeroPersonas'];
 	 	$comentarios = $_REQUEST['comentarios'];

 		if ($idReserva == true) {
 			mysqli_query($conexion,"UPDATE reservas SET fechaReserva='$fechaReserva', horaReserva='$horaReserva', mesaReserva='$mesaReserva', numeroPersonas='$numeroPersonas', numeroPersonas='$numeroPersonas', comentarios='$comentarios' WHERE idReserva='$idReserva'")
 				or die ("Problemas al recuperar contraseña".mysqli_error($conexion));

 			mysqli_close($conexion);

 			echo '<script> alert("Se han cambiado los datos exitosamente");</script>';
			echo '<script> window.location="../html/reservas.php"; </script>';
 		}else{
 			echo '<script> alert("El ID no existe");</script>';
			echo '<script> window.location="../html/reservas.php"; </script>';
 		}
?>