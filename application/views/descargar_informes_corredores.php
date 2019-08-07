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
				<td>%s años</td>
				<td>%s</td>
			 	</tr>";
$htmltrows = "";

$corredores_Femeninas = 0;
$corredores_Masculino = 0;
$corredores_Libre = 0;

foreach ($arr as $a) {
	$htmltrows .= sprintf($htmltrow,
		$a['numero'], htmlspecialchars($a['Nombre']), htmlspecialchars($a['Rama']),htmlspecialchars($a['edad']),
		htmlspecialchars($a['pais']));

	if ($a['Rama'] == 'Femenina') {
		$corredores_Femeninas = $corredores_Femeninas + 1;
	}
	if ($a['Rama'] == 'Masculina') {
		$corredores_Masculino = $corredores_Masculino + 1;# code...
	}
	if ($a['Rama'] == 'Libre') {
		$corredores_Libre = $corredores_Libre + 1;# code...
	}
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Nomina de corredores</title>
</head>
<body>

<div id="container">
	<header>
		<h1><img width="70" src="C:/xampp/htdocs/CarreraAtanacioTzul/recursos/img/logo.png"/> Nomina de corredores</h1>
	</header>
	<div id="body">
		<?php $numero  = count($arr) ?>
		<h1 style="text-align: right; font-size: 15px">El numero Total de corredores es: <?php echo $numero; ?>
			<br>
			<br>El numero de corredores en la rama Femenina es de: <?php echo $corredores_Femeninas; ?>
			<br>El numero de corredores en la rama Masculina es de: <?php echo $corredores_Masculino; ?>
			<br>El numero de corredores en la rama Libre es de: <?php echo $corredores_Libre; ?>
		</h1>
		<table align="center" border="1" height=60 width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<th WIDTH="50">Numero del Atleta</th>
				<th>Nombre</th>
				<th>Categoría</th>
				<th>Edad</th>
				<th>Nacionalidad</th>
  		</tr>
			<tbody>
				<?=$htmltrows?>
			</tbody>
		</table>
		<div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
	</div>
</div>

</body>
</html>
