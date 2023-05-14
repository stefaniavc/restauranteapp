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
						<li role="presentation"><a href="#list-pedidos" aria-control="list-pedidos" data-toggle="tab" role="tab" id="lista-pedidos"><span class="glyphicon glyphicon-list-alt"></span>Pedidos a domicilio</a></li>
						<li role="presentation"><a href="#add-pedidos" aria-control="add-pedidos" data-toggle="tab" role="tab" id="agregar"><span class="glyphicon glyphicon-edit"></span>Agregar pedidos</a></li>
					</ul>
				</div>

				<!-- Contenido de las pestañas -->
				<div class="tab-content">
					<!-- Contenido de los pedidos -->
					<div role="tabpanel" class="tab-pane active" id="list-pedidos">
						<div class="table-reservas clearfix">
								<?php
									$consultar_pedidos=mysqli_query($conexion, "select * from pedidos");
									$anexo=mysqli_fetch_array($consultar_pedidos);
											
											echo '<table class="table table-striped adm-mesas table_reservas" id="contenido-adm">';
											echo '
												<tr>
													<th>Nombres del cliente</th>
													<th>Identidad</th>
													<th>Teléfono</th>
													<th>Teléfono celular</th>
													<th>Dirección</th>
												</tr> ';

											do{
												$nombreCliente=$anexo['nombreCliente'];
												$apellidoCliente=$anexo['apellidoCliente'];
												$identidad=$anexo['identidad'];
												$telefono=$anexo['telefono'];
												$direccion=$anexo['direccion'];
												$telefonoCelular=$anexo['telefonoCelular'];

												echo '<tr>';
												echo	"<td> $nombreCliente  $apellidoCliente</td>" ;
												echo	"<td> $identidad </td> ";
												echo	"<td> $telefono </td>" ;
												echo	"<td> $telefonoCelular </td>" ;
												echo	"<td> $direccion </td> ";
												echo '</tr>';

											}while($anexo=mysqli_fetch_array($consultar_pedidos));

											echo '</table>';
								?>
						</div>
					</div>
					<!-- Agregar pedidos -->
					<div role="tabpanel" class="tab-pane clearfix" id="add-pedidos">
						<?php

							$consultar_pedidos=mysqli_query($conexion, "SELECT * from pedidos");

								$anexo=mysqli_fetch_array($consultar_pedidos);
									echo '<table class="table table-striped adm-mesas" id="contenido-adm">';

									echo '
											<tr>
											<th>ID</th>
											<th>Identificación del cliente</th>
											<th>Teléfono</th>
											<th>Teléfono celular</th>
											<th>Dirección</th>
											
										</tr> ';

									do{
										$idPedido=$anexo['idPedido'];
										$identidad=$anexo['identidad'];
										$telefono=$anexo['telefono'];
										$direccion=$anexo['direccion'];
										$telefonoCelular=$anexo['telefonoCelular'];

										echo '<tr>';
										echo	"<td> <input type='text' value='$idPedido' readonly='readonly' class='nummesa'> </div></div></td>" ;
										echo	"<td> $identidad </td>" ;
										echo	"<td> $telefono </td>" ;
										echo	"<td> $telefonoCelular </td>" ;
										echo	"<td> $direccion </td> ";
										
										echo '</tr>';

									}while($anexo=mysqli_fetch_array($consultar_pedidos));

									echo '</table>';
						?>

						<div class="agregar clearfix">
							<ul class="nav nav-tabs">
								<li><a href="#seccion2" data-toggle="collapse"><span class="glyphicon glyphicon-trash"></span>Eliminar domicilio</a></li>
								<li><a href="#seccion3" data-toggle="collapse"><span class="glyphicon glyphicon-pencil"></span>Editar domicilio</a></li>
								<li><a href="#seccion" data-toggle="collapse"><span class="glyphicon glyphicon-plus"></span>Agregar domicilio</a></li>
							</ul><br><br><br><br>

							<div class="collapse contenedor-agregar editar" id="seccion2">
								<form action="../php/eliminar_domi.php" method="post" name="eliminarMesa" role="form">
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
								<form action="../php/update_domicilios.php" method="post" name="Editar reserva" role="form">
									<div class="form-group">
										<label for="idPedido">ID del pedido</label>
										<input type="text" class="form-control" name="idPedido">

										<label for="identidad">Identificación del cliente</label>
										<input type="text" class="form-control" name="identidad">

										<label for="telefono">Teléfono del cliente</label>
										<input type="text" class="form-control" name="telefono">

										<label for="telefonoCelular">Teléfono celular</label>
										<input type="text" class="form-control" name="telefonoCelular">

										<label for="direccion">Dirección</label>
										<input type="text" class="form-control" name="direccion">
									</div>

									<div class="form-group">
										<input type="submit" class="form-control agregar" name="editar" value="Editar"><br><br><br><br>
									</div>
								</form>
							</div>

							<div class="collapse contenedor-agregar" id="seccion">
								<div class="form">
										<form action="../php/registro_reservas.php" method="post" name="pedido" role="form" class="registro-usuario reservas">

											<div class="form-group">
												<label for="nombreCliente">Nombres del cliente</label>
												<input type="text" class="form-control" name="nombreCliente"> <br>
											</div>

											<div class="form-group">
												<label for="apellidoCliente">Apellidos del cliente</label>
												<input type="text" class="form-control" name="apellidoCliente"> <br>
											</div>

											<div class="form-group">
												<label for="identidad">Identidad del cliente</label>
												<input type="text" class="form-control" name="identidad"> <br>
											</div>

											<div class="form-group">
												<label for="telefono">Teléfono del cliente</label>
												<input type="text" class="form-control" name="telefono"> <br>
											</div>

											<div class="form-group">
												<label for="telefonoCelular">Teléfono celular del cliente</label>
												<input type="text" class="form-control" name="telefonoCelular"> <br>
											</div>

											<div class="form-group">
												<label for="direccion">Dirección del cliente</label>
												<input type="text" class="form-control" name="direccion"> <br>
											</div>
										
											<div class="modal-footer">
													<a type="submit" name="registrarPedido" class="btn btn-primary mesa" onclick="document.forms.pedido.submit()"><span class="glyphicon glyphicon-check"></span>Agregar pedido</a>
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