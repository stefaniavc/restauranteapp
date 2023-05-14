<?php

	session_start();
	include '../php/iniciar_seccion.php';

	$sql = mysqli_query($conexion,'SELECT fotoPerfil FROM usuario');
	$res = mysqli_fetch_array($sql);
	$imgPerfil=$res['fotoPerfil'];

	if(isset($_SESSION['user'])){
?>

<!DOCTYPE html>
<html lang="es-es">
<head>
	<title>Usuarios</title>
	<link rel="icon" type="image/x-icon" href="../imagenes/login/favicon.ico">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/css.css">
</head>

<body>
	<div class="row">
		<div class="colu-1 col-xs-1 col-sm-1 col-md-2">
			<div class="contenedor-menu">

				<img src="../imagenes/login/cthulhu-logo.png" alt="Logo de la empresa" width="100%" height="115px" class="clearfix visible-md-block visible-lg-block">

				<ul>
				<li class="divider clearfix visible-md-block visible-lg-block"></li>
				<li id="p"><a href="inicio.php"><span class="glyphicon glyphicon-home"></span>Inicio</a></li>
				<li id="p"><a href="reservas.php"><span class="glyphicon glyphicon-calendar"></span>Reservas</a></li>
				<li id="p"><a href="domicilios.php"><span class="glyphicon glyphicon-shopping-cart"></span>Domicilios</a></li>
				<li id="p"><a href="productos.php"><span class="glyphicon glyphicon-glass"></span>Productos</a></li>
				<li id="p"><a href="usuario.php"><span class="glyphicon glyphicon-user"></span>Empleados</a></li>
				<li id="p"><a href="informacion.php"><span class="glyphicon glyphicon-info-sign"></span>Información</a></li>
				<li class="dropup desplegablesito" id="p pd"><a href="#" class="dropdown-toggle menusito" id="dropdownmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="contenedor-img-usuario"><img src="../imagenes/usuario/user.png" alt="img-usuario" width="30px" height="30px" class="img-circle img-usuario">
				</span>
					<?php echo '<b>'.$_SESSION['user'] .'</b>'?>
				<span class="glyphicon glyphicon-chevron-up"></span>
					
					<ul class="dropdown-menu clearfix" aria-labelledby="dropdownmenu">
						<li class="clearfix"><a href="../php/salir.php" class="clearfix"><span class="glyphicon glyphicon-log-out"></span>Salir</a></li>
					</ul>

				</a></li>

				</ul>
			</div>
		</div>

		<div class="colu-2 col-xs-11 col-sm-11 col-md-10">
			<div role="tabpanel" class="contenedor-contenido">
				<div class="cont-pestanas-mesa">
					<ul class="pestanas-mesa nav nav-tabs izquierda" role="tablist">
						<li role="presentation"><a href="#list-empleados" aria-control="list-empleados" data-toggle="tab" role="tab" id="lista-pedidos"><span class="glyphicon glyphicon-list-alt"></span>Empleados</a></li>
						<li role="presentation"><a href="#add-empleados" aria-control="add-empleados" data-toggle="tab" role="tab" id="agregarEmpleado"><span class="glyphicon glyphicon-edit"></span>Administrar empleados</a></li>
						<li role="presentation"><a href="#add-usuarios" aria-control="add-usuarios" data-toggle="tab" role="tab" id="agregarUser"><span class="glyphicon glyphicon-edit"></span>Administrar usuarios</a></li>
					</ul>
				</div>

				<!-- Contenido de las pestañas -->
				<div class="tab-content">
					<!-- Contenido de los empleados -->
					<div role="tabpanel" class="tab-pane active" id="list-empleados">
						<div class="table-reservas clearfix">
								<?php
									$consultar_empleados=mysqli_query($conexion, "select * from empleados");
									$anexo=mysqli_fetch_array($consultar_empleados);
											
											echo '<table class="table table-striped adm-mesas table_reservas" id="contenido-adm">';
											echo '
												<tr>
													<th>Nombres del empleado</th>
													<th>Documento</th>
													<th>Genero</th>
													<th>Edad</th>
													<th>Ciudad</th>
													<th>Telédono celular</th>
													<th>Rol del empleado</th>
													<th>Paga del empleado</th>
												</tr> ';

											do{
												$nombre=$anexo['nombre'];
												$apellido=$anexo['apellido'];
												$documento=$anexo['documento'];
												$genero=$anexo['genero'];
												$edad=$anexo['edad'];
												$ciudad=$anexo['ciudad'];
												$telefonoCelular=$anexo['telefonoCelular'];
												$rolEmpleado=$anexo['rolEmpleado'];
												$pagaEmpleado=$anexo['pagaEmpleado'];

												echo '<tr>';
												echo	"<td> $nombre $apellido</td>" ;
												echo	"<td> $documento </td> ";
												echo	"<td> $genero</td>" ;
												echo	"<td> $edad </td> ";
												echo	"<td> $ciudad</td>" ;
												echo	"<td> $telefonoCelular</td>" ;
												echo	"<td> $rolEmpleado </td> ";
												echo	"<td> $pagaEmpleado</td>" ;

												echo '</tr>';

											}while($anexo=mysqli_fetch_array($consultar_empleados));

											echo '</table>';
								?>
						</div>
					</div>
					<!-- Agregar empleados -->
					<div role="tabpanel" class="tab-pane clearfix" id="add-empleados">
					<div class="agregar clearfix tablaEm">
							<ul class="nav nav-tabs">
								<li><a href="#seccion2" data-toggle="collapse"><span class="glyphicon glyphicon-trash"></span>Eliminar empleado</a></li>
								<li><a href="#seccion3" data-toggle="collapse"><span class="glyphicon glyphicon-pencil"></span>Editar empleado</a></li>
								<li><a href="#seccionv" data-toggle="collapse"><span class="glyphicon glyphicon-plus"></span>Agregar empleado</a></li>
							</ul><br><br><br><br>

							<div class="collapse contenedor-agregar editar" id="seccion2">
								<form action="../php/eliminar_emp.php" method="post" name="eliminarMesa" role="form">
									<div class="form-group">
										<label for="eliminarMesa">ID del pedido</label>
										<input type="text" class="form-control" name="eliminarMesa">
									</div>

									<div class="form-group">
										<input type="submit" class="form-control agregar" name="eliminar" value="Eliminar"><br><br><br><br>
									</div>
								</form>
							</div>

							<div class="collapse contenedor-agregar editar" id="seccion3">
								<form action="../php/update_empleado.php" method="post" name="Editar reserva" role="form">
									<div class="form-group">
										<label for="idEmpleado">ID del pedido</label>
										<input type="text" class="form-control" name="idEmpleado">

										<label for="nombre">Nombres del empleado</label>
										<input type="text" class="form-control" name="nombre">

										<label for="apellido">Apellidos del empleado</label>
										<input type="text" class="form-control" name="apellido">

										<label for="documento">Documento</label>
										<input type="text" class="form-control" name="documento">

										<label for="genero">Género</label>
										<input type="text" class="form-control" name="genero">

										<label for="edad">Edad</label>
										<input type="text" class="form-control" name="edad">

										<label for="ciudad">Ciudad</label>
										<input type="text" class="form-control" name="ciudad">

										<label for="telefono">Teléfono</label>
										<input type="text" class="form-control" name="telefono">

										<label for="telefonoCelular">Teléfono celular</label>
										<input type="text" class="form-control" name="telefonoCelular">

										<label for="rolEmpleado">Rol del empleado</label>
										<input type="text" class="form-control" name="rolEmpleado">

										<label for="pagaEmpleado">Paga del empleado</label>
										<input type="text" class="form-control" name="pagaEmpleado">

									</div>

									<div class="form-group">
										<input type="submit" class="form-control agregar" name="editar" value="Editar"><br><br><br><br>
									</div>
								</form>
							</div>

							<div class="collapse contenedor-agregar" id="seccionv">
								<div class="form">
											<form action="../php/registro_empleado.php" method="post" name="registroEmpleado" role="form" enctype="multipart/form-data" class="registro-usuario">

												<div class="form-group">
													<label for="nombre">Nombres de empleado</label>
													<input type="text" class="form-control" name="nombre"> <br>
												</div>

												<div class="form-group">
													<label for="apellido">Apellidos de empleado</label>
													<input type="text" class="form-control" name="apellido"> <br>
												</div>

												<div class="form-group">
													<label for="documento">Documento de identidad</label>
													<input type="text" class="form-control" name="documento"> <br>
												</div>

												<div class="form-group">
													<label for="genero">Genero</label>
													<input type="text" class="form-control" name="genero"> <br>
												</div>

												<div class="form-group">
													<label for="edad">Edad del empleado</label>
													<input type="text" class="form-control" name="edad"> <br>
												</div>

												<div class="form-group">
													<label for="ciudad">Ciudad del empleado</label>
													<input type="text" class="form-control" name="ciudad"> <br>
												</div>

												<div class="form-group">
													<label for="telefono">Teléfono del empleado</label>
													<input type="text" class="form-control" name="telefono"> <br>
												</div>

												<div class="form-group">
													<label for="telefonoCelular">Teléfono celular</label>
													<input type="text" class="form-control" name="telefonoCelular"> <br>
												</div>

												<div class="form-group pregunta-secreta">
													<label for="rolEmpleado">Rol del empleado</label>
														<select class="form-control" name="rolEmpleado">
															<option class="option">Administrador</option>
															<option class="option">Cajero</option>
															<option class="option">Mesero</option>
															<option class="option">Chef</option>
														</select>
												</div> <br>											

												<div class="form-group">
													<label for="pagaEmpleado">Pago mensual del empleado</label>
													<input type="text" class="form-control" name="pagaEmpleado"> <br>
												</div>

												<div class="form-group">
													<label for="fotoEmpleado">Adjuntar Foto</label>
													<input type="file" class="form-control" name="fotoEmpleado"> <br>
												</div>	

											
												<div class="modal-footer">
														<a type="submit" name="registrarEmpleado" class="btn btn-primary" onclick="document.forms.registroEmpleado.submit()"><span class="glyphicon glyphicon-check"></span>Registrar</a>
												</div>
											</form>
								</div>
							</div>

						</div>
						<?php

							$consultar_empleados=mysqli_query($conexion, "SELECT * from empleados");

								$anexo=mysqli_fetch_array($consultar_empleados);
									echo '<table class="table table-striped adm-mesas clearfix tablaEm" id="contenido-adm">';

									echo '
											<tr>
											<th>ID</th>
											<th>Nombres</th>
											<th>Documento</th>
											<th>Teléfono</th>
											<th>Teléfono celular</th>
											<th>Rol</th>
											<th>Paga</th>
											
										</tr> ';

									do{
										$idEmpleado=$anexo['idEmpleado'];
										$nombre=$anexo['nombre'];
										$apellido=$anexo['apellido'];
										$documento=$anexo['documento'];
										$telefono=$anexo['telefono'];
										$telefonoCelular=$anexo['telefonoCelular'];
										$rolEmpleado=$anexo['rolEmpleado'];
										$pagaEmpleado=$anexo['pagaEmpleado'];

										echo '<tr>';
										echo	"<td> <input type='text' value='$idEmpleado' readonly='readonly' class='nummesa'> </div></div></td>" ;
										echo	"<td> $nombre $apellido</td>" ;
										echo	"<td> $documento </td>" ;
										echo	"<td> $telefono </td> ";
										echo	"<td> $telefonoCelular </td>" ;
										echo	"<td> $rolEmpleado </td>" ;
										echo	"<td> $pagaEmpleado </td> ";

										
										echo '</tr>';

									}while($anexo=mysqli_fetch_array($consultar_empleados));

									echo '</table>';
						?>

					</div>
					<!-- Agregar usuarios -->
					<div role="tabpanel" class="tab-pane clearfix" id="add-usuarios">
						<?php
									$consultar_usuarios=mysqli_query($conexion, "select * from usuario");
									$anexo=mysqli_fetch_array($consultar_usuarios);
											
											echo '<table class="table table-striped adm-mesas table_reservas" id="contenido-adm">';
											echo '
												<tr>
													<th>ID</th>
													<th>Nombre de usuario</th>
													<th>Tipo de cuenta</th>
												</tr> ';

											do{
												$nombreUsuario=$anexo['nombreUsuario'];
												$idUsuario=$anexo['idUsuario'];
												$tipoCuenta=$anexo['tipoCuenta'];

												echo '<tr>';
												echo	"<td> $idUsuario</td>" ;
												echo	"<td> $nombreUsuario</td>" ;
												echo	"<td> $tipoCuenta </td> ";
												echo '</tr>';

											}while($anexo=mysqli_fetch_array($consultar_usuarios));

											echo '</table>';
								?>

						<div class="agregar clearfix">
							<ul class="nav nav-tabs">
								<li><a href="#seccionEliminar" data-toggle="collapse"><span class="glyphicon glyphicon-trash"></span>Eliminar Usuario</a></li>
								<li><a href="#seccionUsuario" data-toggle="collapse"><span class="glyphicon glyphicon-plus"></span>Agregar usuario</a></li>
							</ul><br><br><br><br>

							<div class="collapse contenedor-agregar editar" id="seccionEliminar">
								<form action="../php/eliminar_user.php" method="post" name="eliminarMesa" role="form">
									<div class="form-group">
										<label for="eliminarMesa">ID del pedido</label>
										<input type="text" class="form-control" name="eliminarMesa">
									</div>

									<div class="form-group">
										<input type="submit" class="form-control agregar" name="eliminar" value="Eliminar"><br><br><br><br>
									</div>
								</form>
							</div>

							<div class="collapse contenedor-agregar" id="seccionUsuario">
								<div class="form">
											<form action="../php/registro_usuario.php" method="post" name="registroUser" role="form" enctype="multipart/form-data" class="registro-usuario">

												<div class="form-group">
													<label for="nombreUsuario">Nombre de Usuario</label>
													<input type="text" class="form-control" name="nombreUsuario"> <br>
												</div>

												<div class="form-group">
													<label for="contraseñaUsuario">Contraseña de Usuario</label>
													<input type="password" class="form-control" name="passUsuario"> <br>
												</div>

												<div class="form-group">
													<label for="contraseñaUsuario">Confirmación Contraseña de Usuario</label>
													<input type="password" class="form-control" name="Con_passUsuario"> <br>
												</div>

												<div class="form-group pregunta-secreta">
													<label for="preguntaSecreta">Pregunta Secreta</label>
														<select class="form-control" name="preguntaSecreta">
															<option class="option">Nombre de tu primer mascota</option>
															<option class="option">Cual es tu gato gay favorito</option>
															<option class="option">Equipo deportivo favorito</option>
															<option class="option">Pelicula favorita</option>
															<option class="option">Apellido de tu pareja</option>
														</select>
												</div> <br>

												<div class="form-group">
													<label for="contraseñaPreguntaS">Respuesta de la Pregunta Secreta</label>
													<input type="password" class="form-control" name="passPreguntaS"> <br>
												</div>

												<div class="form-group">
													<label for="fotoUsuario">Adjuntar Foto</label>
													<input type="file" class="form-control" name="fotoUsuario"> <br>
												</div>

												<div class="form-group pregunta-secreta">
													<label for="tipoCuenta">Tipo de Usuario</label>
														<select class="form-control" name="tipoCuenta">
															<option class="option">Administrador</option>
															<option class="option">Cajero</option>
															<option class="option">Mesero</option>
														</select>
												</div> <br>

												

											
												<div class="modal-footer">
														<a type="submit" name="registrarUsuario" class="btn btn-primary" onclick="document.forms.registroUser.submit()"><span class="glyphicon glyphicon-check"></span>Registrar</a>
												</div>
											</form>
								</div>
							</div>

							

						</div>						
					</div>
				</div>
			</div>
		</div>
	</div>



<script src="../js/jquery-1.12.3.min.js"></script>
<script src="../js/bootstrap.min.js"></script>	
</body>
</html>

<?php

	} else{
		echo '<script> window.location="../index.php"; </script>';
	}
?>

