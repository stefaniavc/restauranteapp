<?php

	session_start();
	include '../php/iniciar_seccion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<script>
		function marcar(obj,chk) {
			elem=obj.getElementsByTagName('input');
  		for(i=0;i<elem.length;i++)
  			elem[i].checked=chk.checked;
}
</script>
</head>
<body>
<?php

$consultar_mesas=mysqli_query($conexion, "SELECT * from mesas");

	$anexo=mysqli_fetch_array($consultar_mesas);
		echo '<table class="table table-striped adm-mesas" id="contenido-adm">';

		echo '
				<tr>
				<th>ID</th>
				<th># Mesa</th>
				<th>Zona</th>
				<th class="basura"><span class="glyphicon glyphicon-trash"></span></th>
			</tr> ';

		do{
			$idMesa=$anexo['idMesa'];
			$numeroMesa=$anexo['numeroMesa'];
			$zonaMesa=$anexo['zonaMesa'];

			echo '<tr>';
			echo	"<td> <div class='form-group'><div class='input-group'><span class='input-group-addon'><input type='checkbox' class='checkbox' onclick='marcar(this.parentNode,this)'></span><input type='text' value='$idMesa' readonly='readonly' class='nummesa'> </div></div></td>" ;
			echo	"<td> $numeroMesa </td>" ;
			echo	"<td> $zonaMesa </td> ";
			echo	'<td class="x"><a href="php/eliminar_mesas.php" method"post" id="eliminar"><span class="glyphicon glyphicon-remove"></span></a></td> ';
			echo '</tr>';

		}while($anexo=mysqli_fetch_array($consultar_mesas));

		echo '</table>';


?>

	<div class="agregar">
		<ul>
			<li><a href="#seccion" data-toggle="collapse"><span class="glyphicon glyphicon-plus"></span>Agregar Mesa</a></li>
		</ul><br><br><br>

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
</body>
</html>