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
				<td>%s</td>
				<td>%s</td>
			 	</tr>";
$htmltrows = "";
$id_empleado = '';
foreach ($arr as $a) {
	$id_empleado = $a['id_empleado'];
	$htmltrows .= sprintf($htmltrow,
		$a['nombre'],$a['apellido'], htmlspecialchars($a['usuario']),htmlspecialchars($a['nacimiento']),
		$a['cui'],htmlspecialchars($a['rol']), htmlspecialchars($a['cargo']));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<title>Incersion reciente</title>
</head>
<body>
<div id="container">
	<?php $this->load->view('menu'); ?>
	<header>
		<h1><img width="70" src="<?=$base_url?>/recursos/img/logo.png"/>Incersión reciente</h1>
	</header>

	<div id="body">

 		<table class="table table-bordered">
			<thead>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Usuario</th>
				<th>Fecha de nacimiento</th>
				<th>cui</th>
				<th>Rol</th>
				<th>Cargo</th>
			</thead>
			<tbody>
				<?=$htmltrows?>
			</tbody>
		</table>
    <br><a class='btn btn-primary btn-md' href="<?=$base_url?>/inicio">Listo</a>
		<td><a class='btn btn-secondary' href="<?=$base_url?>/usuario/editar/<?=$id_empleado?>">editar</a></td>
    <div class="alert alert-success" onclick="$(this).hide(1000)"><?=$mensaje?></div>
	</div><br><br><br><br><br><br>
	<footer><?php $this->load->view('footer') ?></footer>
</div>

</body>
</html>
