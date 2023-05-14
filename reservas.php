<?php

	session_start();
	include '../php/iniciar_seccion.php';

	if(isset($_SESSION['user']))
{?>

<!DOCTYPE html>
<html lang="es-es">
<head>
	<title>Bienvenido!</title>
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
				<li class="dropup desplegablesito" id="p pd"><a href="#" class="dropdown-toggle menusito" id="dropdownmenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<span class="contenedor-img-usuario"><img src="../imagenes/usuario/user.png" alt="img-usuario" width="30px" height="30px;" class="img-circle img-usuario"></span>
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
					<ul class="pestanas-mesa nav nav-tabs" role="tablist">
						
						<li role="presentation"><a href="#list-reservas" aria-control="list-reservas" data-toggle="tab" role="tab" id="lista-reservas"><span class="glyphicon glyphicon-th-list"></span>Listado de reservas</a></li>
						
						<li role="presentation"><a href="#adm-reservas" aria-control="adm-reservas" data-toggle="tab" role="tab" id="administrar-reservas"><span class="glyphicon glyphicon-cog"></span>Administrador de reservas</a></li>
						
					</ul>
				</div>

				<!-- Contenido de las pestañas -->
				<div class="tab-content">
					<!-- Contenido de las reservas -->
					<div role="tabpanel" class="tab-pane active" id="list-reservas">
						<div id="contenedor" class="clearfix">
							<div class="table-reservas">
								<?php
									$consultar_reservas=mysqli_query($conexion, "select * from reservas");
									$anexo=mysqli_fetch_array($consultar_reservas);
											
											echo '<table class="table table-striped adm-mesas table_reservas" id="contenido-adm">';
											echo '
												<tr>
													<th>Nombres del Reservante</th>
													<th>Telefono</th>
													<th>Fecha de la reserva</th>
													<th>Hora de la reserva</th>
													<th>Mesa</th>
													<th>Número de personas</th>
													<th>Comentarios</th>
												</tr> ';

											do{
												$nombreReservante=$anexo['nombreReservante'];
												$apellidoReservante=$anexo['apellidoReservante'];
												$telefonoReservante=$anexo['telefonoReservante'];
												$fechaReserva=$anexo['fechaReserva'];
												$horaReserva=$anexo['horaReserva'];
												$mesaReserva=$anexo['mesaReserva'];
												$numeroPersonas=$anexo['numeroPersonas'];
												$comentarios=$anexo['comentarios'];

												echo '<tr>';
												echo	"<td> $nombreReservante  $apellidoReservante</td>" ;
												echo	"<td> $telefonoReservante </td> ";
												echo	"<td> $fechaReserva </td>" ;
												echo	"<td> $horaReserva </td>" ;
												echo	"<td> $mesaReserva </td> ";
												echo	"<td> $numeroPersonas </td>" ;
												echo	"<td> $comentarios </td>" ;
												echo '</tr>';

											}while($anexo=mysqli_fetch_array($consultar_reservas));

											echo '</table>';
								?>
							</div>
						</div>
					</div>
					<!-- Panel de administración de las reservas  -->
					<div role="tabpanel" class="tab-pane administrar clearfix" id="adm-reservas">
						<?php

							$consultar_reservas=mysqli_query($conexion, "SELECT * from reservas");

								$anexo=mysqli_fetch_array($consultar_reservas);
									echo '<table class="table table-striped adm-mesas" id="contenido-adm">';

									echo '
											<tr>
											<th>ID</th>
											<th>Nombre del reservante</th>
											<th>Fecha de la reserva</th>
											<th>Hora de la reserva</th>
											<th>Numero de mesa</th>
											
										</tr> ';

									do{
										$idReserva=$anexo['idReserva'];
										$nombreReservante=$anexo['nombreReservante'];
										$fechaReserva=$anexo['fechaReserva'];
										$horaReserva=$anexo['horaReserva'];
										$mesaReserva=$anexo['mesaReserva'];

										echo '<tr>';
										echo	"<td> <input type='text' value='$idReserva' readonly='readonly' class='nummesa'> </div></div></td>" ;
										echo	"<td> $nombreReservante </td>" ;
										echo	"<td> $fechaReserva </td>" ;
										echo	"<td> $horaReserva </td>" ;
										echo	"<td> $mesaReserva </td> ";
										
										echo '</tr>';

									}while($anexo=mysqli_fetch_array($consultar_reservas));

									echo '</table>';
						?>
						
							

						<div class="agregar clearfix">
							<ul class="nav nav-tabs">
								<li><a href="#seccion2" data-toggle="collapse"><span class="glyphicon glyphicon-trash"></span>Eliminar reserva</a></li>
								<li><a href="#seccion3" data-toggle="collapse"><span class="glyphicon glyphicon-pencil"></span>Editar reserva</a></li>
								<li><a href="#seccion" data-toggle="collapse"><span class="glyphicon glyphicon-plus"></span>Agregar reserva</a></li>
							</ul><br><br><br><br>

							<?php
								$eliminar = mysqli_query($conexion,"SELECT * FROM reservas");

								$anexo = mysqli_fetch_array($eliminar);

								$idReserva = $anexo['idReserva'];
							?>

							<div class="collapse contenedor-agregar editar" id="seccion2">
								<?php echo "<form action='../php/eliminar_reserva.php' method='post' name='eliminarMesa' role='form'>" ?>
									<div class="form-group">
										<label for="eliminarMesa">ID de la reserva</label>
										<input type="text" class="form-control" name="eliminarMesa">
									</div>

									<div class="form-group">
										<input type="submit" class="form-control agregar" name="eliminar" value="Eliminar"><br><br><br><br>
									</div>
								</form>
							</div>

							<div class="collapse contenedor-agregar editar" id="seccion3">
								<form action="../php/update_reservas.php" method="post" name="Editar reserva" role="form">
									<div class="form-group">
										<label for="idReserva">ID de la reserva</label>
										<input type="text" class="form-control" name="idReserva">
									</div>

									<div class="form-group">
										<label for="fechaReserva">Fecha de la reserva</label>
										<input type="date" class="form-control" name="fechaReserva">
									</div>

									<div class="form-group">
										<label for="horaReserva">Hora de la reserva</label>
										<input type="time" class="form-control" name="horaReserva">
									</div>

									<div class="form-group">
										<label for="mesaReserva">Mesa de la reserva</label>
										<input type="text" class="form-control" name="mesaReserva">
									</div>

									<div class="form-group">
										<label for="numeroPersonas"># de personas</label>
										<input type="text" class="form-control" name="numeroPersonas">
									</div>

									<div class="form-group">
										<label for="comentarios">Comebtarios</label>
										<input type="text" class="form-control" name="comentarios">
									</div>

									<div class="form-group">
										<input type="submit" class="form-control agregar" name="editar" value="Editar"><br><br><br><br>
									</div>
								</form>
							</div>

							<div class="collapse contenedor-agregar" id="seccion">
								<div class="form">
										<form action="../php/registro_reservas.php" method="post" name="reserva" role="form" class="registro-usuario reservas">

											<div class="form-group">
												<label for="nombreReservante">Nombres del Reservante</label>
												<input type="text" class="form-control" name="nombreReservante"> <br>
											</div>

											<div class="form-group">
												<label for="apellidoReservante">Apellidos del Reservante</label>
												<input type="text" class="form-control" name="apellidoReservante"> <br>
											</div>

											<div class="form-group">
												<label for="telefono">Telefono</label>
												<input type="text" class="form-control" name="telefonoReservante"> <br>
											</div>

											<div class="form-group">
												<label for="fechaReserva">Fecha de la Reserva</label>
												<input type="date" class="form-control" name="fechaReserva"> <br>
											</div>

											<div class="form-group">
												<label for="horaReserva">Hora de la Reserva</label>
												<input type="time" class="form-control" name="horaReserva"> <br>
											</div>

											<div class="form-group">
												<label for="mesa"># de Mesa</label>
												<input type="text" class="form-control" name="mesaReserva"> <br>
											</div>

											<div class="form-group">
												<label for="personas"># de Personas</label>
												<input type="text" class="form-control" name="numeroPersonas"> <br>
											</div>

											<div class="form-group">
												<label for="coments">Comentarios</label>
												<input type="text" class="form-control comentarios" name="comentarios"> <br>
											</div>
										
											<div class="modal-footer">
													<a type="submit" name="registrarUsuario" class="btn btn-primary mesa" onclick="document.forms.reserva.submit()"><span class="glyphicon glyphicon-check"></span>Agregar reserva</a>
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