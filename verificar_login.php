<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Iniciando Sección...</title>
</head>
<body>
	<?php
		include 'iniciar_seccion.php';
		if (isset($_POST['entrar'])) {
			$usuario = $_POST['user'];
			$password = $_POST['pass'];
			$log = mysqli_query($conexion,"SELECT * FROM usuario WHERE nombreUsuario='$usuario' AND claveUsuario='$password'");
			if (mysqli_num_rows($log)>0) {
				$row = mysqli_fetch_array($log);
				$_SESSION["user"] = $row["nombreUsuario"];
				$_SESSION["img"] = $row['fotoPerfil'];
					echo 'Iniciando sesión para '.$_SESSION['user'].' <p>';
					echo '<script> window.location="../html/inicio.php"; </script>';
			}

			else{
				echo '<script> alert("Usuario o contraseña incorrectos"); </script>';
				echo '<script> window.location="../index.php"; </script>';
			}

		}
	?>
</body>
</html>