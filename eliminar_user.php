<?php

include 'iniciar_seccion.php';

$eliminar = $_REQUEST['eliminarMesa'];

mysqli_query($conexion, "DELETE from usuario where idUsuario='$eliminar'")
	or die ("No se pudo completar la acción");

	echo "Mesa Eliminada Exitosamente";
	echo '<script> window.location="../html/usuario.php?mod=inicio"; </script>';

?>