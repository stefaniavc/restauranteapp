<?php

include 'iniciar_seccion.php';

mysqli_query($conexion, "insert INTO reservas(nombreReservante,apellidoReservante,telefonoReservante,fechaReserva,horaReserva,mesaReserva,numeroPersonas,comentarios
) values ('$_REQUEST[nombreReservante]','$_REQUEST[apellidoReservante]','$_REQUEST[telefonoReservante]','$_REQUEST[fechaReserva]','$_REQUEST[horaReserva]','$_REQUEST[mesaReserva]','$_REQUEST[numeroPersonas]','$_REQUEST[comentarios]')")
				or die("Problemas en el Select".mysqli_error($conexion));

			mysqli_close($conexion);

				echo '<script> alert("La reserva fue Agregada exitosamente");</script>';
				echo '<script> window.location="../html/reservas.php?mod=inicio"; </script>';

?>