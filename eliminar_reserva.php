<?php

include 'iniciar_seccion.php';

$eliminar = $_REQUEST['eliminarMesa'];

mysqli_query($conexion, "DELETE from reservas where idReserva='$eliminar'")
	or die ("No se pudo completar la acción");

	echo "Reserva Eliminada Exitosamente";
	echo '<script> window.location="../html/reservas.php?mod=inicio"; </script>';

?>