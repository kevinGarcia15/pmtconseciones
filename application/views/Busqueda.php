<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";

$htmltrow = "<tr>
				<td>%s</td>
				<td>%s</td>
				<td><a href=\"${base_url}/corredor/detalles/%s\">ver mas</a></td>
			</tr>\n";
$htmltrows = "";

foreach ($arr as $a) {
	$htmltrows .= sprintf($htmltrow,
		$a['Nombre'], $a['Numero'],$a['id_corredor']);
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<title>Busqueda Corredor</title>
</head>
<body>

<div id="container">
	<?php $this->load->view('menu'); ?>
	<header>
		<h1><img width="70" src="<?=$base_url?>/recursos/img/2019.png"/> Resultado Busqueda</h1>
	</header>

	<div id="body">
		<table class="table table-striped">
			<thead>
				<th>Nombre</th>
				<th>Número</th>
				<th>Acciones</th>
			</thead>
			<tbody>
				<?=$htmltrows?>
			</tbody>
		</table>
		<div class="label label-danger" onclick="$(this).hide(1000)"><?=$mensaje?></div>
	</div><br><br><br><br><br><br><br>
	<footer><?php $this->load->view('footer') ?></footer>
</div>

</body>
</html>
