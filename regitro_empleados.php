<?php
		
		$foto_empleado = $_FILES['fotoEmpleado']['name'];
		$ruta = $_FILES['fotoEmpleado']['tmp_name'];
		$destino = "../imagenes/empleados/".$foto_empleado;
		copy($ruta, $destino);
		include 'iniciar_seccion.php';

		mysqli_query($conexion, "insert INTO empleados (nombre, apellido, documento, genero, edad, ciudad, telefono, telefonoCelular, rolEmpleado, pagaEmpleado, fotoEmpleado) values ('$_REQUEST[nombre]','$_REQUEST[apellido]','$_REQUEST[documento]','$_REQUEST[genero]','$_REQUEST[edad]','$_REQUEST[ciudad]','$_REQUEST[telefono]','$_REQUEST[telefonoCelular]','$_REQUEST[rolEmpleado]','$_REQUEST[pagaEmpleado]','$destino')")
				or die("Problemas en el Select".mysqli_error($conexion));

			mysqli_close($conexion);

				echo '<script> alert("Empleado Agregado exitosamente");</script>';
				echo '<script> window.location="../html/usuario.php?mod=inicio"; </script>';

?>