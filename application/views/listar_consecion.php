<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
if (count($arr) < 1) {
	$mensaje = "Sin registros!";
}
if ($this->session->ROL == 'Administrador') {
	$htmltrow = "<tr>
					<td>%s</td>
					<td>%s</td>
					<td>%s</td>
					<td>%s</td>
					<td>%s</td>
					<td>%s</td>
					<td><a class='btn btn-secondary' href=\"${base_url}/informes/detalles/%s\">Ver mas</a></td>
					<td><a class='btn btn-danger' id='boton_eliminar' onclick='mensaje(%s)'>Eliminar</a></td>
				 	</tr>";
	$htmltrows = "";
	$thead = "<th>Eliminar</th>";
	foreach ($arr as $a) {
		$htmltrows .= sprintf($htmltrow,$a['numero'],$a['nombre_contratista'],$a['nombre_piloto'],$a['ruta'],$a['numero_placa'],$a['tipo'],$a['id_consecion'],$a['id_consecion']);
	}
}else {
	$htmltrow = "<tr>
					<td>%s</td>
					<td>%s</td>
					<td>%s</td>
					<td>%s</td>
					<td>%s</td>
					<td>%s</td>
					<td><a class='btn btn-secondary' href=\"${base_url}/informes/detalles/%s\">Ver mas</a></td>
					</tr>";
	$htmltrows = "";
	$thead = "";
	foreach ($arr as $a) {
		$htmltrows .= sprintf($htmltrow,$a['numero'],$a['nombre_contratista'],$a['nombre_piloto'],$a['ruta'],$a['numero_placa'],$a['tipo'],$a['id_consecion']);
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<title>Lista de conseciones</title>
</head>
<body>
<div id="container">
	<?php $this->load->view('menu'); ?>
	<header>
		<h1><img width="70" src="<?=$base_url?>/recursos/img/logo.png"/>Lista de conseciones</h1>
	</header>

	<div id="body">
		<?php
			$numero  = count($arr);
		?>
<div class="container">
  <div class="row"> Ordenar por...
    <div class="col-sm-3">
				<select id="orden" onchange="return ordenar()" class="form-control" name="orden">
					<option value="numero"<?php if($categoria=="numero"){echo "selected";}  ?>>Número</option>
					<option value="nombre_contratista"<?php if($categoria=="nombre_contratista"){echo "selected";}  ?>>Nombre del contratista</option>
					<option value="nombre_piloto"<?php if($categoria=="nombre_piloto"){echo "selected";}  ?>>Nombre del piloto</option>
				</select>
  </div>buscar por...
	<div class="col-sm-2">
	<form class="form-inline" id="navbarTogglerDemo01" action="<?=$base_url?>/informes/buscar" method="POST">
		<select  class="form-control" name="criterio">
			<option value="numero">Número concesión</option>
			<option value="v.numero_placa">Número de placa</option>
			<option value="pil.nombre">Nombre del piloto</option>
		</select>
	</div>
	<div class="col-sm-2">
			<input class="form-control mr-sm-2" name="busqueda" type="search" placeholder="Search..." aria-label="Search">
	</div>
	<div class="col-sm-2">
			<button class="btn btn-outline-success mr-sm-2" type="submit" name="buscar">Buscar</button>
	</div>
</form>
</div>
<hr><div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<th>Número de conseción</th>
			<th>Nombre del contratista</th>
			<th>Nombre del piloto</th>
			<th>Ruta</th>
			<th>Número de placa</th>
			<th>Tipo de vehículo</th>
			<th>Detalles</th>
			<?php echo $thead; ?>
		</thead>
		<tbody>
			<?=$htmltrows?>
		</tbody>
	</table>
</div>
    <br><a class='btn btn-primary btn-md' href="<?=$base_url?>/inicio/">Listo</a>
    <div class="alert alert-danger alert-dismissible fade show" onclick="$(this).hide(1000)"><?=$mensaje?></div>
	</div>
	<br><br><br><br>
	<footer><?php $this->load->view('footer') ?></footer>
</div>
<script type="text/javascript">
function ordenar(){
	let opcion = document.getElementById('orden').value
	window.location.href = '<?=$base_url?>/informes/listar/'+opcion+'';
}

function mensaje(id){
	// confirm dialog
alertify.confirm("¿Está seguro de omitir?", function (e) {
		if (e) {
			window.location.href = '<?=$base_url?>/informes/borrar/'+id;
		}else{
		}
	});
}

//$('#boton_eliminar').attr("disabled", true);
 </script>
</body>
</html>
