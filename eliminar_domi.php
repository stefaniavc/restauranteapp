<?php

include 'iniciar_seccion.php';

$eliminar = $_REQUEST['eliminarMesa'];

mysqli_query($conexion, "DELETE from pedidos where idPedido='$eliminar'")
	or die ("No se pudo completar la acción");

	echo "Domicilio Eliminada Exitosamente";
	echo '<script> window.location="../html/domicilios.php?mod=inicio"; </script>';

?>