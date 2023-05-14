<?php

include 'iniciar_seccion.php';

$logo = $_FILES['logo']['name'];
$ruta = $_FILES['logo']['tmp_name'];
$destino = "../imagenes/logo/".$logo;
copy($ruta, $destino);

mysqli_query($conexion, "insert INTO organizacion(nombreOrganizacion, NitOrganizacion, tipoOrganizacion, direccion, telefono, email, regimen, resolucionDiam, rangofacturacion, representanteLegal, logo, eslogan) values ('$_REQUEST[nomorganizacion]','$_REQUEST[nitorganizacion]','$_REQUEST[tipoorganizacion]','$_REQUEST[direccion]','$_REQUEST[telefono]','$_REQUEST[email]','$_REQUEST[regimen]','$_REQUEST[redian]','$_REQUEST[rangofac]','$_REQUEST[reprelegal]','$destino','$_REQUEST[eslogan]')")
				or die("Problemas en el Select".mysqli_error($conexion));

			mysqli_close($conexion);

				echo '<script> alert("Informacion Agregada exitosamente");</script>';
				echo '<script> window.location="../html/informacion.php?mod=inicio"; </script>';

?>