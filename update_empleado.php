<head>
	<meta charset="utf-8">
</head>

<?php 
include 'iniciar_seccion.php';

 	 	$idEmpleado = $_REQUEST['idEmpleado'];
 	 	$nombre = $_REQUEST['nombre'];
 	 	$apellido = $_REQUEST['apellido'];
 	 	$documento = $_REQUEST['documento'];
 	 	$genero = $_REQUEST['genero'];
 	 	$edad = $_REQUEST['edad'];
 	 	$ciudad = $_REQUEST['ciudad'];
 	 	$telefono = $_REQUEST['telefono'];
 	 	$telefonoCelular = $_REQUEST['telefonoCelular'];
 	 	$rolEmpleado = $_REQUEST['rolEmpleado'];
 	 	$pagaEmpleado = $_REQUEST['pagaEmpleado'];

 		if ($idEmpleado == true) {
 			mysqli_query($conexion,"UPDATE empleados SET nombre='$nombre', apellido='$apellido', documento='$documento', genero='$genero', edad='$edad', ciudad='$ciudad', telefono='$telefono', telefonoCelular='$telefonoCelular', rolEmpleado='$rolEmpleado', pagaEmpleado='$pagaEmpleado', WHERE idEmpleado='$idEmpleado'")
 				or die ("Problemas al recuperar contraseña".mysqli_error($conexion));

 			mysqli_close($conexion);

 			echo '<script> alert("Se han cambiado los datos exitosamente");</script>';
			echo '<script> window.location="../html/reservas.php"; </script>';
 		}else{
 			echo '<script> alert("El ID no existe");</script>';
			echo '<script> window.location="../html/reservas.php"; </script>';
 		}
?>