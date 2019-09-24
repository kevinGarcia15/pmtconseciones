<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
if (count($arr) < 1) {
	$mensaje = "No hubo coinsidencias!";
}

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

foreach ($arr as $a) {
	$htmltrows .= sprintf($htmltrow,$a['numero'],$a['nombre_contratista'],$a['nombre_piloto'],$a['ruta'],$a['numero_placa'],$a['tipo'],$a['id_consecion'],$a['id_consecion']);
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
		</thead>
		<tbody>
			<?=$htmltrows?>
		</tbody>
	</table>
</div>
    <br><a class='btn btn-primary btn-md' href="<?=$base_url?>/informes/listar">Atras</a>
    <div class="alert alert-danger alert-dismissible fade show" onclick="$(this).hide(1000)"><?=$mensaje?></div>
	</div>
	<br><br><br><br>
	<footer><?php $this->load->view('footer') ?></footer>
</div>
<script type="text/javascript">

 </script>
</body>
</html>
