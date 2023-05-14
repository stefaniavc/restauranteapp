<?php
	
	if ($_REQUEST['nombreUsuario'] == '' or $_REQUEST['passUsuario'] == '' or $_REQUEST['Con_passUsuario'] == '' or $_REQUEST['passPreguntaS'] == '' or $_REQUEST['tipoCuenta']) {
		
		$password = $_REQUEST['passUsuario'];

		$foto_usuario = $_FILES['fotoUsuario']['name'];
		$ruta = $_FILES['fotoUsuario']['tmp_name'];
		$destino = "../imagenes/usuario/".uniqid()."-".$foto_usuario;
		copy($ruta, $destino);
		include 'iniciar_seccion.php';

		mysqli_query($conexion, "insert INTO usuario(nombreUsuario, claveUsuario, preguntaSeguridad, respuestaPreguntaSecreta, tipoCuenta, fotoPerfil) values ('$_REQUEST[nombreUsuario]','$_REQUEST[passUsuario]','$_REQUEST[preguntaSecreta]','$_REQUEST[passPreguntaS]','$_REQUEST[tipoCuenta]','$destino')")
				or die("Problemas en el Select".mysqli_error($conexion));

			mysqli_close($conexion);

				echo '<script> alert("Usuario Agregado exitosamente");</script>';
				echo '<script> window.location="../html/usuario.php?mod=inicio"; </script>';

	}

	else{
		echo '<script> alert("Por favor llene todos los campos");</script>';
		echo '<script> alert("Las contraseñas no coinciden");</script>';
		echo '<script> window.location="../html/usuario.php?mod=inicio"; </script>';
	}


//.uniqid()."-"
?>
