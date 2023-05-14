<?php

	session_start();
	include '../php/iniciar_seccion.php';

	$consulta_mesas=mysqli_query($conexion, "SELECT * from mesas");

	$anexo=mysqli_fetch_array($consulta_mesas);
	$numeroMesa=$anexo['numeroMesa'];
	$personasMesa=$anexo['personasMesa'];

	if(isset($_SESSION['user']))
{?>

<!DOCTYPE html>
<html lang="es-es">
<head>
	<title>Mesas</title>
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
				<span class="contenedor-img-usuario"> <img src='../imagenes/usuario/user.png' alt='img-usuario' width='30px' height='30px;' class='img-circle img-usuario'></span>
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
						
						<li role="presentation"><a href="#list-mesas" aria-control="list-mesas" data-toggle="tab" role="tab" id="lista-mesas"><span class="glyphicon glyphicon-th-list"></span>Listado de mesas</a></li>
						
						<li role="presentation"><a href="#administrar" aria-control="administrar" data-toggle="tab" role="tab" id="administrar-mesas"><span class="glyphicon glyphicon-cog"></span>Administrador de mesas</a></li>
						
					</ul>
				</div>

				<!-- Contenido de las pestañas -->
				<div class="tab-content">
					<!-- Contenido de las mesas -->
					<div role="tabpanel" class="tab-pane active" id="list-mesas">
						<div id="contenedor" class="clearfix">
							<div class="mesa">
								<div class="contenedor-mesa">
									
									<?php 

										do{
											$numeroMesa=$anexo['numeroMesa'];
											$personasMesa=$anexo['personasMesa'];
											$zonaMesa=$anexo['zonaMesa'];

											echo "<a href='#modalPedidoMesa' class='btn btn-primary mesa' data-toggle='modal'>$numeroMesa";
											echo "<div class='personas'>";
											echo "<p><span class='glyphicon glyphicon-user'></span>$personasMesa</p>";
											echo "<p class='estado'><span class='glyphicon glyphicon-eye-open'></span>$zonaMesa</p>";
											echo "</div>";
											

										}while ($anexo=mysqli_fetch_array($consulta_mesas));
											echo "</a>";

									?>

									<div class="modal fade ventana-emergente" id="modalPedidoMesa">
										<div class="modal-dialog">
											<div class="modal-content"> 
											<!--Contenido de la ventada-->
												<div class="modal-header">
												<!-- Encabezado-->
													<a type="buttom" class="close" data-dismiss="modal" aria-hidden="true">&times;</a>
													<h4 class="modal-title">Seleccionar Pedido</h4>
												</div>
													<div class="modal-body"> 
														<!-- Contenido del cuerpo -->
														<div class="tab-content">
														<!-- Contenido de los pedidos -->
															<div role="tabpanel" class="tab-pane active" id="list-pedidos">
																<div class="table-reservas clearfix">
																	<div class="tabpanel productos">
																		<ul class="nav nav-tabs" role="tablist">
																			<li role="presentation" class="active"><a href="#seccione" aria-controls="" data-toggle="tab" role="tab">Entradas</a></li>
																			<li role="presentation"><a href="#seccionf" aria-controls="" data-toggle="tab" role="tab">Platos fuertes</a></li>
																			<li role="presentation"><a href="#seccioni" aria-controls="" data-toggle="tab" role="tab">Platos infantiles</a></li>
																			<li role="presentation"><a href="#seccionp" aria-controls="" data-toggle="tab" role="tab">Postres</a></li>
																			<li role="presentation"><a href="#seccionn" aria-controls="" data-toggle="tab" role="tabn">Ensaladas</a></li>
																			<li role="presentation"><a href="#seccionb" aria-controls="" data-toggle="tab" role="tab">Bebidas</a></li>
																		</ul>

																		<!-- Contenido -->

																		<div class="tab-content">
																			
																			<!-- Sección de ENTRADAS -->
																			
																			<div class="tab-pane active" role="tabpanel" id="seccione">
																					<div class="contenedor-platos">
																						<div id="entradas">
																                        	<h1>Entradas</h1>
																                            	<div class="entrada1 platos">
																                                <h3>Crema de Melón</h3>
																                                <div> <img src="../imagenes/carta/entradas/Crema-de-Melon.png" width="259" height="169"> </div>
																                            </div>
																                            <div class="entrada2 platos">
																                                <h3>Crema de Champiñones</h3>
																                                <div> <img src="../imagenes/carta/entradas/Crema-de-Champiñones.png" width="259" height="169"> </div>
																                            </div>
																                            <div class="entrada3 platos">
																                                <h3>Sopa Campesina</h3>
																                                <div> <img src="../imagenes/carta/entradas/Sopa-Campesina.png" width="259" height="169"> </div>
																                            </div>
																                            <div class="entrada4 platos">
																                                <h3>Sopa de Arracacha</h3>
																                                <div> <img src="../imagenes/carta/entradas/Sopa-de-Arracacha.png" width="259" height="169"> </div>
																                            </div>
																                            <div class="entrada5 platos">
																                                <h3>Sopa de Guineo</h3>
																                                <div> <img src="../imagenes/carta/entradas/Sopa-de-Guineo.png" width="259" height="169"> </div>
																                            </div>
																                            <div class="entrada6 platos">
																                                <h3>Sopa Mexicana</h3>
																                                <div> <img src="../imagenes/carta/entradas/Sopa-Mexicana.png" width="259" height="169"> </div>
																                            </div>
																                            <div class="entrada7 platos">
																                                <h3>Ceviche de Camarones</h3>
																                                <div> <img src="../imagenes/carta/entradas/Ceviche-de-Camarones.png" width="259" height="169"> </div>
																                            </div>
																                    	</div>
																					</div>
																			</div>

																			<!-- Sección de PLATOS FUERTES -->
																			<div class="tab-pane" role="tabpanel" id="seccionf">
																				<div class="contenedor-platos clearfix">
																					<div id="pfuertes" class="clearfix">
																                        <h1>Platos fuertes</h1>
																                            <div id="tipicos" class="clearfix">
																                                <h2>Típicos</h2>
																                                        <div class="tipico1 platos">
																                                            <h4>Pescado en Salsa de Camarones</h4>
																                                            <div> <img src="../imagenes/carta/platosfuertes/tipicos/Pescado-con-Camarones.png" width="259" height="169"> </div>
																                                        </div>
																                                        <div class="tipico2 platos">
																                                            <h4>Parrillada de Mar</h4>
																                                            <div> <img src="../imagenes/carta/platosfuertes/tipicos/Picada-de-Mar.png" width="259" height="169"> </div>
																                                        </div>
																                                        <div class="tipico3 platos">
																                                            <h4>Fríjoles con Chicharrón</h4>
																                                            <div> <img src="../imagenes/carta/platosfuertes/tipicos/Frijoles-con-chicharron.png" width="259" height="169"> </div>
																                                        </div>
																                                        <div class="tipico4 platos">
																                                            <h4>Fríjoles Verdes</h4>
																                                            <div> <img src="../imagenes/carta/platosfuertes/tipicos/Frijoles-Verdes.png" width="259" height="169"> </div>
																                                        </div>
																                                        <div class="tipico5 platos">
																                                            <h4>Bandeja Paisa</h4>
																                                            <div> <img src="../imagenes/carta/platosfuertes/tipicos/Bandeja-Paisa.png" width="259" height="169"> </div>
																                                        </div>
																                                        <div class="tipico6 platos">
																                                            <h4>Cazuela Típica</h4>
																                                            <div> <img src="../imagenes/carta/platosfuertes/tipicos/Cazuela-Tipica.png" width="259" height="169"> </div>
																                                        </div>
																                                        <div class="tipico7 platos">
																                                            <h4>Mondongo</h4>
																                                            <div> <img src="../imagenes/carta/platosfuertes/tipicos/Mondongo.png" width="259" height="169"> </div>
																                                        </div>
																                                        <div class="tipico8 platos">
																                                            <h4>Hígado Encebollado</h4>
																                                            <div> <img src="../imagenes/carta/platosfuertes/tipicos/Higado-Encebollado.png" width="259" height="169"> </div>
																                                        </div>
																                                        <div class="tipico9 platos">
																                                            <h4>Ajiaco</h4>
																                                            <div> <img src="../imagenes/carta/platosfuertes/tipicos/Ajiaco.png" width="259" height="169"> </div>
																                                        </div>
																                                        <div class="tipico10 platos">
																                                            <h4>Sudado de Posta</h4>
																                                            <div> <img src="../imagenes/carta/platosfuertes/tipicos/Sudado-de-Posta.png" width="259" height="169"> </div>
																                                        </div>
																                                        <div class="tipico11 platos">
																                                            <h4>Lengua en Finas Hierbas</h4>
																                                            <div> <img src="../imagenes/carta/platosfuertes/tipicos/Lengua-en-Finas-Hierbas.png" width="259" height="169"> </div>
																                                        </div>
																                                        <div class="tipico12 platos">
																                                            <h4>Sudado de Bagre</h4>
																                                            <div> <img src="../imagenes/carta/platosfuertes/tipicos/Sudado-de-Bagre.png" width="259" height="169"> </div>
																                                        </div>
																                                        <div class="tipico13 platos">
																                                            <h4>Sancocho de Gallina</h4>
																                                            <div> <img src="../imagenes/carta/platosfuertes/tipicos/Sancocho.png" width="259" height="169"> </div>
																                                        </div>
																                            </div>

																                            <div id="plancha" class="clearfix">
																                                <h2>Plancha</h2>
																                                    <div class="plancha1 platos">
																                                        <h4>Pollo/Pechuga</h4>
																                                        <div> <img src="../imagenes/carta/platosfuertes/plancha/Pollo.png" width="259" height="169"> </div>
																                                    </div>
																                                    <div class="plancha2 platos">
																                                        <h4>Trucha</h4>
																                                        <div> <img src="../imagenes/carta/platosfuertes/plancha/Trucha.png" width="259" height="169"> </div>
																                                    </div>
																                                    <div class="plancha3 platos">
																                                        <h4>Pescado</h4>
																                                        <div> <img src="../imagenes/carta/platosfuertes/plancha/Planchita-de-Pescado.png" width="259" height="169"> </div>
																                                    </div>
																                                    <div class="plancha4 platos">
																                                        <h4>Atún</h4>
																                                        <div> <img src="../imagenes/carta/platosfuertes/plancha/Atun.png" width="259" height="169"> </div>
																                                    </div>
																                                    <div class="plancha5 platos">
																                                        <h4>Salmón</h4>
																                                        <div> <img src="../imagenes/carta/platosfuertes/plancha/Planchita-de-Salmon.png" width="259" height="169"> </div>
																                                    </div>
																                                    <div class="plancha6 platos">
																                                        <h4>Sobrebarriga</h4>
																                                        <div> <img src="../imagenes/carta/platosfuertes/plancha/Sobrebarriga.png" width="259" height="169"> </div>
																                                    </div>
																                                    <div class="plancha7 platos">
																                                        <h4>Churrasco</h4>
																                                        <div> <img src="../imagenes/carta/platosfuertes/plancha/Planchita-de-Churrasco.png" width="259" height="169"> </div>
																                                    </div>
																                                    <div class="plancha8 platos">
																                                        <h4>Solomito</h4>
																                                        <div> <img src="../imagenes/carta/platosfuertes/plancha/Solomito.png" width="259" height="169"> </div>
																                                    </div>
																                                    <div class="plancha9 platos">
																                                        <h4>Punta de Anca</h4>
																                                        <div> <img src="../imagenes/carta/platosfuertes/plancha/Planchita-de-Punta-de-Anca.png" width="259" height="169"> </div>
																                                    </div>
																                                    <div class="plancha10 platos">
																                                        <h4>Cañón de Cerdo</h4>
																                                        <div> <img src="../imagenes/carta/platosfuertes/plancha/Cañón-de-Cerdo.png" width="259" height="169"> </div>
																                                    </div>
																                                    <div class="plancha11 platos">
																                                        <h4>Langostinos</h4>
																                                        <div> <img src="../imagenes/carta/platosfuertes/plancha/Planchita-de-Langostinos.png" width="259" height="169"> </div>
																                                    </div>
																                                    <div class="plancha12 platos">
																                                        <h4>Mixta sin Langostinos</h4>
																                                        <div> <img src="../imagenes/carta/platosfuertes/plancha/Planchita-Mixta-sin-Langostinos.png" width="259" height="169"> </div>
																                                    </div>
																                            </div>
																                            <div id="cazuelas" class="clearfix">
																                                <h2>Cazuelas</h2>
																                                    <div class="cazuela1 platos">
																                                        <h4>Cazuela Típica</h4>
																                                        <div> <img src="../imagenes/carta/platosfuertes/cazuelas/Cazuela-Tipica.png" width="259" height="169"> </div>
																                                    </div>
																                                    <div class="cazuela2 platos">
																                                        <h4>Cazuela Mexicana</h4>
																                                        <div> <img src="../imagenes/carta/platosfuertes/cazuelas/Cazuela-Mexicana.png" width="259" height="169"> </div>
																                                    </div>
																                                    <div class="cazuela3 platos">
																                                        <h4>Cazuela de Bagre</h4>
																                                        <div> <img src="../imagenes/carta/platosfuertes/cazuelas/Cazuela-de-Bagre.png" width="259" height="169"> </div>
																                                    </div>
																                                    <div class="cazuela4 platos">
																                                        <h4>Cazuela de Mariscos</h4>
																                                        <div> <img src="../imagenes/carta/platosfuertes/cazuelas/Cazuela-de-Mariscos.png" width="259" height="169"> </div>
																                                    </div>
																                            </div>
																                    </div>
																                </div>

																			</div>

																			<!-- Sección de PLATOS INFANTILES -->
																			<div class="tab-pane" role="tabpanel" id="seccioni">
																				<div class="contenedor-platos clearfix">
																					<div id="minfantil">
																                        <h1>Menú infaltil</h1>
																                            <div id="infantil1" class="platos">
																                                <h3>Mini Típico</h3>
																                                <div> <img src="../imagenes/carta/infantil/Mini-Tipico.png" width="259" height="169"> </div>
																                            </div>
																                            <div id="infantil2" class="platos">
																                                <h3>Nuggets de Pollo</h3>
																                                <div> <img src="../imagenes/carta/infantil/Nuggets-de-Pollo.png" width="259" height="169"> </div>
																                            </div>
																                            <div id="infantil3" class="platos">
																                                <h3>Deditos de Pescado</h3>
																                                <div> <img src="../imagenes/carta/infantil/Deditos-de-Pescado-Apanados.png" width="259" height="169"> </div>
																                            </div>
																                            <div id="infantil4" class="platos">
																                                <h3>Julianas de Solomito</h3>
																                                <div> <img src="../imagenes/carta/infantil/Julianas-de-Solomito.png" width="259" height="169"> </div>
																                            </div>
																                            <div id="infantil5" class="platos">
																                                <h3>Mini Ajiaco</h3>
																                                <div> <img src="../imagenes/carta/infantil/Mini-Ajiaco.png" width="259" height="169"> </div>
																                            </div>
																                    </div>
																				</div>
																			</div>

																			<!-- Sección de POSTRES -->
																			<div class="tab-pane" role="tabpanel" id="seccionp">
																				<div class="contenedor-platos clearfix">
																					<div id="postres">
																                        <h1>Postres</h1>
																                            <div id="postre1" class="platos">
																                                <h3>Cheesecake</h3>
																                                <div> <img src="../imagenes/carta/postres/Cheesecake.jpg" width="259" height="169"> </div>
																                            </div>
																                            <div id="postre2" class="platos">
																                                <h3>Flan de Leche</h3>
																                                <div> <img src="../imagenes/carta/postres/Flan-de-Leche.jpg" width="259" height="169"> </div>
																                            </div>
																                            <div id="postre3" class="platos">
																                                <h3>Postre de Natas</h3>
																                                <div> <img src="../imagenes/carta/postres/Postre-de-Natas.jpg" width="259" height="169"> </div>
																                            </div>
																                            <div id="postre4" class="platos">
																                                <h3>Brownie con Helado</h3>
																                                <div> <img src="../imagenes/carta/postres/Brownie-con-Helado.jpg" width="259" height="169"> </div>
																                            </div>
																                            <div id="postre5" class="platos">
																                                <h3>Cassata</h3>
																                                <div> <img src="../imagenes/carta/postres/Cassatta.jpg" width="259" height="169"> </div>
																                            </div>
																                            <div id="postre6" class="platos">
																                                <h3>Tiramisú</h3>
																                                <div> <img src="../imagenes/carta/postres/Tiramisu.jpg" width="259" height="169"> </div>
																                            </div>
																                            <div id="postre7" class="platos">
																                                <h3>Arequipe, Brevas, Queso</h3>
																                                <div> <img src="../imagenes/carta/postres/Brevas-con-Arequipe.jpg" width="259" height="169"> </div>
																                            </div>
																                            <div id="postre8" class="platos">
																                                <h3>Cuajada con Melao</h3>
																                                <div> <img src="../imagenes/carta/postres/Cuajada-con-Melao.jpg" width="259" height="169"> </div>
																                            </div>
																                            <div id="postre9" class="platos">
																                                <h3>Mazamorra</h3>
																                                <div> <img src="../imagenes/carta/postres/Mazamorra.png" width="259" height="169"> </div>
																                            </div>

																                    </div>
																				</div>
																			</div>

																			<!-- Sección de ENSALADAS -->
																			<div class="tab-pane" role="tabpanel" id="seccionn">
																				<div class="contenedor-platos clearfix">
																					<div id="ensaladas">
																                        <h1>Ensaladas</h1>
																                            <div class="ensalada1 platos">
																                                <h3>Ensalada Primavera</h3>
																                                <div> <img src="../imagenes/carta/ensaladas/Ensalada-Primavera.png" width="259" height="169"> </div>
																                            </div>
																                            <div class="ensalada2 platos">
																                                <h3>Ensalada Hatoviejo</h3>
																                                <div> <img src="../imagenes/carta/ensaladas/Ensalada-Hatoviejo.png" width="259" height="169"> </div>
																                            </div>
																                            <div class="ensalada3 platos">
																                                <h3>Ensalada Mediterránea</h3>
																                                <div> <img src="../imagenes/carta/ensaladas/Ensalada-Mediterranea.png" width="259" height="169"> </div>
																                            </div>
																                    </div>
																				</div>
																			</div>

																			<!-- Sección de BEBIDAS -->
																			<div class="tab-pane" role="tabpanel" id="seccionb">
																				<div class="contenedor-platos clearfix">
																					<div id="bebidas" class="clearfix">
																						<h1>Bebidas comumes</h1>

																							<div class="bebidas1 platos">
																                                <h3>Ensalada Mediterránea</h3>
																                                <div> <img src="../imagenes/carta/bebidas/bebidas/agua.png" width="259" height="169"> </div>
																                            </div>

																                            <div class="bebidas2 platos">
																                                <h3>Ensalada Mediterránea</h3>
																                                <div> <img src="../imagenes/carta/bebidas/bebidas/cocacola.png" width="259" height="169"> </div>
																                            </div>

																                            <div class="bebidas3 platos">
																                                <h3>Ensalada Mediterránea</h3>
																                                <div> <img src="../imagenes/carta/bebidas/bebidas/Jagua.png" width="259" height="169"> </div>
																                            </div>

																                            <div class="bebidas4 platos">
																                                <h3>Ensalada Mediterránea</h3>
																                                <div> <img src="../imagenes/carta/bebidas/bebidas/Jleche.png" width="259" height="169"> </div>
																                            </div>

																                            <div class="bebidas5 platos">
																                                <h3>Ensalada Mediterránea</h3>
																                                <div> <img src="../imagenes/carta/bebidas/bebidas/postobon.png" width="259" height="169"> </div>
																                            </div>
																                    </div>
																						<div class="vinos clearfix">
																							<h1>Vinos</h1>
											
																								<div class="bebidas5 platos">
																	                                <h3>Ensalada Mediterránea</h3>
																	                                <div> <img src="../imagenes/carta/bebidas/vinos/blanco2.png" width="259" height="169"> </div>
																	                            </div>

																	                            <div class="bebidas5 platos">
																	                                <h3>Ensalada Mediterránea</h3>
																	                                <div> <img src="../imagenes/carta/bebidas/vinos/rosado2.png" width="259" height="169"> </div>
																	                            </div>

																	                            <div class="bebidas5 platos">
																	                                <h3>Ensalada Mediterránea</h3>
																	                                <div> <img src="../imagenes/carta/bebidas/vinos/tinto2.png" width="259" height="169"> </div>
																	                            </div>
																                        </div>
																				</div>
																			</div>

																		</div>
																	</div>		
																</div>
															</div>
														</div>
													<div class="modal-footer">
														<a type="submit" name="eslogan" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>Cerrar</a>
														<a type="submit" name="pedido" class="btn btn-primary" onclick="document.forms.registro.submit()"><span class="glyphicon glyphicon-check"></span>Agregar</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- Panel de administración de la mesa -->
					<div role="tabpanel" class="tab-pane administrar clearfix" id="administrar">
						<?php

							$consultar_mesas=mysqli_query($conexion, "SELECT * from mesas");

								$anexo=mysqli_fetch_array($consultar_mesas);
									echo '<table class="table table-striped adm-mesas" id="contenido-adm">';

									echo '
											<tr>
											<th>ID</th>
											<th># Mesa</th>
											<th>Zona</th>
											
										</tr> ';

									do{
										$idMesa=$anexo['idMesa'];
										$numeroMesa=$anexo['numeroMesa'];
										$zonaMesa=$anexo['zonaMesa'];

										echo '<tr>';
										echo	"<td> <div class='form-group'><input type='text' value='$idMesa' readonly='readonly' class='nummesa'> </div></div></td>" ;
										echo	"<td> $numeroMesa </td>" ;
										echo	"<td> $zonaMesa </td> ";
										
										echo '</tr>';

									}while($anexo=mysqli_fetch_array($consultar_mesas));

									echo '</table>';
						?>
						
							

						<div class="agregar clearfix">
							<ul class="nav nav-tabs">
								<li><a href="#seccion2" data-toggle="collapse"><span class="glyphicon glyphicon-trash"></span>Eliminar mesa</a></li>
								<li><a href="#seccion" data-toggle="collapse"><span class="glyphicon glyphicon-plus"></span>Agregar Mesa</a></li>
							</ul><br><br><br><br>

							<div class="collapse contenedor-agregar" id="seccion2">
								<form action="../php/eliminar_mesas.php" method="post" name="eliminarMesa" role="form">
									<div class="form-group">
										<label for="eliminarMesa">ID de la mesa</label>
										<input type="text" class="form-control" name="eliminarMesa">
									</div>

									<div class="form-group">
										<input type="submit" class="form-control agregar" name="eliminar" value="Eliminar"><br><br><br><br>
									</div>
								</form>
							</div>

							<div class="collapse contenedor-agregar" id="seccion">
								<form action="../php/registro_mesas.php" method="post" name="agregarMesas" role="form">
									<div class="form-group">
										<label for="numeroMesa">Numero de Mesa</label>
										<input type="text" class="form-control" name="numeroMesa">
									</div>
									
									<div class="form-group">
										<label for="maxPersonas">Maximo de Personas</label>
										<input type="text" class="form-control" name="personasMesa">
									</div>
									
									<div class="form-group">
										<label for="zonaMesa">Zona de la Mesa</label>
										<input type="text" class="form-control" name="zonaMesa">
									</div>

									<div class="form-group">
										<input type="submit" class="form-control agregar" name="agregar" value="Agregar">
									</div>
								</form>
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