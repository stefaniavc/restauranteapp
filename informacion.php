<?php

	session_start();
	include '../php/iniciar_seccion.php';

	$consulta_informacion=mysqli_query($conexion, "select * from organizacion");

	$anexo=mysqli_fetch_array($consulta_informacion);
	$nombreOrganizacion=$anexo['nombreOrganizacion'];
	$NitOrganizacion=$anexo['NitOrganizacion'];
	$tipoOrganizacion=$anexo['tipoOrganizacion'];
	$direccion=$anexo['direccion'];
	$telefono=$anexo['telefono'];
	$email=$anexo['email'];
	$regimen=$anexo['regimen'];
	$resolucionDiam=$anexo['resolucionDiam'];
	$rangofacturacion=$anexo['rangofacturacion'];
	$representanteLegal=$anexo['representanteLegal'];
	$logo=$anexo['logo'];
	$eslogan=$anexo['eslogan'];

	if(isset($_SESSION['user']))
{?>

<!DOCTYPE html>
<html lang="es-es">
<head>
	<title>Información</title>
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
				<li id="p"><a href="domicilio.php"><span class="glyphicon glyphicon-shopping-cart"></span>Domicilios</a></li>
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
			<div class="contenedor-contenido">
				<!-- Boton con ventana emergente-->
				<a href="#modalinformacion" class="btn btn-primary boton-ventana clearfix" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span>Agregar información</a>

					<div class="modal fade ventana-emergente" id="modalinformacion">
						<div class="modal-dialog">
							<div class="modal-content"> <!--Contenido de la ventada-->
								<div class="modal-header"><!-- Encabezado-->
									<a type="buttom" class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
									<h4 class="modal-title">Agregar información</h4>
								</div>
								<div class="modal-body"> <!-- Contenido del cuerpo -->
									<div class="form">
										<form action="../php/registro_informacion.php" method="post" name="registro" role="form" enctype="multipart/form-data">
											<div class="form-group">
												<label for="organizacion">Nombre de la organización</label>
												<input type="text" name="nomorganizacion" class="form-control">
											</div>
											<div class="form-group">
												<label for="nit">NIT de la organización</label>
												<input type="text" name="nitorganizacion" class="form-control">
											</div>
											<div class="form-group">
												<label for="tipo">Tipo de Organización</label>
												<input type="text" name="tipoorganizacion" class="form-control">
											</div>
											<div class="form-group">
												<label for="direccion">Dirección</label>
												<input type="text" name="direccion" class="form-control">
											</div>
											<div class="form-group">
												<label for="tel">Telefono</label>
												<input type="text" name="telefono" class="form-control">
											</div>
											<div class="form-group">
												<label for="email">Correo electrónico</label>
												<input type="text" name="email" class="form-control">
											</div>
											<div class="form-group">
												<label for="regimen">Regimen de la organización</label>
												<input type="text" name="regimen" class="form-control">
											</div>
											<div class="form-group">
												<label for="dian">Resolución DIAN de la organización</label>
												<input type="text" name="redian" class="form-control">
											</div>
											<div class="form-group">
												<label for="rango">Rango de facturación</label>
												<input type="text" name="rangofac" class="form-control">
											</div>
											<div class="form-group">
												<label for="representante">Representante legal de la organización</label>
												<input type="text" name="reprelegal" class="form-control">
											</div>
											<div class="form-group">
												<label for="logo">Logotipo de la organización</label>
												<input type="file" name="logo" class="form-control">
											</div>
											<div class="form-group">
												<label for="eslogan">Eslogan de la organización</label>
												<input type="text" name="eslogan" class="form-control">
											</div>
										</form>
										<div class="modal-footer">
												<a type="submit" name="eslogan" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cerrar</a>
												<a type="submit" name="eslogan" class="btn btn-primary" onclick="document.forms.registro.submit()"><span class="glyphicon glyphicon-check"></span>Guardar</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

				<!-- El resto del contenido-->
				<div class="cont clearfix">
					<form action="../php/registro_usuario.php" method="post" name="registro" role="form" enctype="multipart/form-data">
						<div class="form-group">
							<label for="organizacion">Nombre de la organización</label>
							<input type="text" name="nomorganizacion" class="form-control" readonly="readonly" value="<?php echo "$nombreOrganizacion";?>">
						</div>
						<div class="form-group">
							<label for="nit">NIT de la organización</label>
							<input type="text" name="nitorganizacion" class="form-control" readonly="readonly" value="<?php echo "$NitOrganizacion";?>" >
						</div>
						<div class="form-group">
							<label for="tipo">Tipo de Organización</label>
							<input type="text" name="tipoorganizacion" class="form-control" readonly="readonly" value="<?php echo "$tipoOrganizacion";?>" >
						</div>
						<div class="form-group">
							<label for="direccion">Dirección</label>
							<input type="text" name="direccion" class="form-control" readonly="readonly" value="<?php echo "$direccion";?>" >
						</div>
						<div class="form-group">
							<label for="tel">Telefono</label>
							<input type="text" name="telefono" class="form-control" readonly="readonly" value="<?php echo "$telefono";?>" >
						</div>
						<div class="form-group">
							<label for="email">Correo electrónico</label>
							<input type="text" name="email" class="form-control" readonly="readonly" value="<?php echo "$email";?>" >
						</div>
						<div class="form-group">
							<label for="regimen">Regimen de la organización</label>
							<input type="text" name="regimen" class="form-control" readonly="readonly" value="<?php echo "$regimen";?>" >
						</div>
						<div class="form-group">
							<label for="dian">Resolución DIAN de la organización</label>
							<input type="text" name="redian" class="form-control" readonly="readonly" value="<?php echo "$resolucionDiam";?>" >
						</div>
						<div class="form-group">
							<label for="rango">Rango de facturación</label>
							<input type="text" name="rangofac" class="form-control" readonly="readonly" value="<?php echo "$rangofacturacion";?>" >
						</div>
						<div class="form-group">
							<label for="representante">Representante legal de la organización</label>
							<input type="text" name="reprelegal" class="form-control" readonly="readonly" value="<?php echo "$representanteLegal";?>" >
						</div>
						<div class="form-group">
							<label for="logo">Logotipo de la organización</label>
							<input type="text" name="logo" class="form-control" readonly="readonly" value="<?php #echo '<img src="imagenes/logo.png"/>' ; ?> ">
						</div>
						<div class="form-group">
							<label for="eslogan">Eslogan de la organización</label>
							<input type="text" name="eslogan" class="form-control" readonly="readonly" value="<?php echo "$eslogan";?>" >
						</div>
					</form>
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