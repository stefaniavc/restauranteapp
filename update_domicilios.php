<head>
	<meta charset="utf-8">
</head>

<?php 
include 'iniciar_seccion.php';

 	 	$idPedido = $_REQUEST['idPedido'];
 	 	$identidad = $_REQUEST['identidad'];
 	 	$telefono = $_REQUEST['telefono'];
 	 	$direccion = $_REQUEST['direccion'];
 	 	$telefonoCelular = $_REQUEST['telefonoCelular'];

 		if ($idPedido == true) {
 			mysqli_query($conexion,"UPDATE pedidos SET identidad='$identidad', telefono='$telefono', direccion='$direccion', telefonoCelular='$telefonoCelular' WHERE idPedido='$idPedido'")
 				or die ("Problemas al recuperar contraseña".mysqli_error($conexion));

 			mysqli_close($conexion);

 			echo '<script> alert("Se han cambiado los datos exitosamente");</script>';
			echo '<script> window.location="../html/domicilios.php"; </script>';
 		}else{
 			echo '<script> alert("El ID no existe");</script>';
			echo '<script> window.location="../html/domicilios.php"; </script>';
 		}
?>