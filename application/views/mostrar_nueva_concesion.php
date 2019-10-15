<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
if (count($arr) < 1) {
	$mensaje = "No hay usuarios activos!";
}

$htmltrow = "<tr>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
				<td>%s</td>
				<td><a class='btn btn-secondary' href=\"${base_url}/informes/detalles/%s\">Ver mas</a></td>

			 	</tr>";
$htmltrows = "";

foreach ($arr as $a) {
	$htmltrows .= sprintf($htmltrow,$a['numero'],$a['nombre_contratista'],$a['nombre_piloto'],$a['ruta'],$a['tipo'],$a['id_consecion']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<title>Nueva inserción</title>
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
  <div class="row">
    <div class="col-sm-4">
    </div>
    <div class="col-sm-2"><br>
    </div>
    <div class="col-sm">
    </div>
  </div>
</div>
<hr><div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<th>Número de conseción</th>
			<th>Nombre del contratista</th>
			<th>Nombre del piloto</th>
			<th>Ruta</th>
			<th>Tipo de vehículo</th>
			<th>Detalles</th>
		</thead>
		<tbody>
			<?=$htmltrows?>
		</tbody>
	</table>
</div>
    <br><a class='btn btn-primary btn-md' href="<?=$base_url?>/inicio/">Listo</a>
		<div class="alert alert-success" onclick="$(this).hide(1000)"><?=$mensaje?></div>
	</div>
	<footer><?php $this->load->view('footer') ?></footer>
</div>
<script type="text/javascript">
	function consultaCategoría(){
		document.getElementById("selectCategoria").submit();
	}
 </script>
</body>
</html>
