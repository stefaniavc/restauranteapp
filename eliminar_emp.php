<?php

include 'iniciar_seccion.php';

$eliminar = $_REQUEST['eliminarMesa'];

mysqli_query($conexion, "DELETE from empleados where idEmpleado='$eliminar'")
	or die ("No se pudo completar la acción");

	echo "Empleado Eliminada Exitosamente";
	echo '<script> window.location="../html/usuario.php?mod=inicio"; </script>';

?>