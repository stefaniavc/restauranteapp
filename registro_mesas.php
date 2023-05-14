<?php

include 'iniciar_seccion.php';

mysqli_query($conexion, "insert INTO mesas(numeroMesa, personasMesa, zonaMesa) values ('$_REQUEST[numeroMesa]','$_REQUEST[personasMesa]','$_REQUEST[zonaMesa]')")
				or die("Problemas en el Select".mysqli_error($conexion));

			mysqli_close($conexion);

				echo '<script> alert("Mesa Agregada exitosamente");</script>';
				echo '<script> window.location="../html/inicio.php?mod=inicio"; </script>';

?>