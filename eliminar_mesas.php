<?php

include 'iniciar_seccion.php';

$eliminar = $_REQUEST['eliminarMesa'];

mysqli_query($conexion, "DELETE from mesas where idMesa='$eliminar'")
	or die ("No se pudo completar la acción");

	echo "Mesa Eliminada Exitosamente";
	echo '<script> window.location="../html/inicio.php?mod=inicio"; </script>';

?>