<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
if (count($arr) < 1) {
	$mensaje = "No hay usuarios activos!";
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<title>Descarga</title>
</head>
<style type="text/css">
::selection { background-color: #E13300; color: white; }
::-moz-selection { background-color: #E13300; color: white; }

body {
	background-color: #fff;
	margin: 40px;
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: black;
}


h1 {
	color: #444;
	background-color: transparent;
	border-bottom: 1px solid #D0D0D0;
	font-size: 19px;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
}


#cabeza{
	display: block;
}
th, td { padding: 1px;
				font-size: 15px;
		}

code {
	font-family: Consolas, Monaco, Courier New, Courier, monospace;
	font-size: 12px;
	background-color: #f9f9f9;
	border: 1px solid #D0D0D0;
	color: #002166;
	display: block;
	margin: 14px 0 14px 0;
	padding: 12px 10px 12px 10px;
}

#body {
	margin: 0 15px 0 15px;
}

#container {
	margin: -38px;
	border: 0px solid #D0D0D0;
	box-shadow: 0 0 0px #D0D0D0;
}
</style>
<body>

<div id="container">
	<header>
	</header>
	<?php foreach ($arr as $a) {?>
<div class="">
	<img style="float:right" width="70" src="C:\xampp\htdocs\pmtconseciones\recursos\img\muni.png" >
	<img style="float:left"  width="70" src="C:\xampp\htdocs\pmtconseciones\recursos\img\imprimir.png" >
	<p align="center">POLICIA MUNICIPAL DE TRANSITO DE TOTONICAPÁN</p>
</div>
<div class="">
	<h2>No. de conseción <?php echo $a['numero']; ?></h2>
	<h4><?php echo "Fecha de impresión " . date("d") . " del " . date("m") . " de " . date("Y"); ?> </h4>
</div>
	<div id="body">
	<!--Información de la conseción-->
		<h3>Información de la concesión</h3>
<hr>
<table style="align="center" border="1"  width="100%" cellpadding="0" cellspacing="0"" font-size: 10px;>
	<tr>
		<th>Tarifa</th>
		<th>Horario inicio de labores </th>
		<th>Horario fin de labores</th>
		<th>Ruta</th>
			</tr>
		<tr>
			<td><?php echo "Q.".$a['tarifa']; ?></td>
			<td><?php echo $a['h_inicio']; ?></td>
			<td><?php echo $a['h_fin']; ?></td>
			<td><?php echo $a['ruta']; ?></td>
		</tr>
</table>

		<h3>Información del contratista</h3>
<hr>
<table style="align="center" border="1" height=60 width="100%" cellpadding="0" cellspacing="0"">
	<tr>
		<th>No. documento DPI</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Fecha de nacimiento</th>
		<th>Teléfono</th>
		<th>Teléfono No. 2</th>
		<th>Domicilio</th>
		<th>Canton/Aldea</th>
		<th>Municipio</th>
	</tr>
		<tr>
			<td><?php echo $a['cui_contra']; ?></td>
			<td><?php echo $a['nombre_contratista']; ?></td>
			<td><?php echo $a['apellido_contra']; ?></td>
			<td><?php echo $a['nacimiento_contra']; ?></td>
			<td><?php echo $a['telefono_contra']; ?></td>
			<td><?php echo $a['telefono2_contra']; ?></td>
			<td><?php echo $a['domicilio_contra']; ?></td>
			<td><?php echo $a['cantald_contra']; ?></td>
			<td><?php echo $a['mun_contra']; ?></td>
		</tr>
</table>

<!-- Informacion del pilotp-->
<h3>Información del piloto</h3>
<hr>
<table style="align="center" border="1" height=60 width="100%" cellpadding="0" cellspacing="0"">
	<tr>
		<th>No. de licencia</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Fecha de nacimiento</th>
		<th>Tipo de licencia</th>
		<th>Teléfono</th>
		<th>Domicilio</th>
		<th>Municipio</th>
		<th>Departamento</th>
	</tr>

		<tr>
			<td><?php echo $a['licencia']; ?></td>
			<td><?php echo $a['nombre_piloto']; ?></td>
			<td><?php echo $a['apellido_piloto']; ?></td>
			<td><?php echo $a['nacimiento_piloto']; ?></td>
			<td><?php echo $a['tipo_lice']; ?></td>
			<td><?php echo $a['telefono_piloto']; ?></td>
			<td><?php echo $a['domicilio_piloto']; ?></td>
			<td><?php echo $a['mun_pil']; ?></td>
			<td><?php echo $a['depto_pil']; ?></td>
		</tr>

</table>

<!-- Informacion del ayudante-->
<h3>Información del ayudante</h3>
<hr>
<table style="align="center" border="1" height=60 width="100%" cellpadding="0" cellspacing="0"">
	<tr>
		<th>No. de documento DPI</th>
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Fecha de nacimiento</th>
		<th>Teléfono</th>
		<th>Domicilio</th>
		<th>Municipio</th>
		<th>Departamento</th>
	</tr>

		<tr>
			<td><?php echo $a['cui_ayudante']; ?></td>
			<td><?php echo $a['nombre_ayudante']; ?></td>
			<td><?php echo $a['apellido_ayudante']; ?></td>
			<td><?php echo $a['nacimiento_ayudante']; ?></td>
			<td><?php echo $a['telefono_ayudante']; ?></td>
			<td><?php echo $a['domicilio_ayudante']; ?></td>
			<td><?php echo $a['mun_ayudante']; ?></td>
			<td><?php echo $a['depto_ayudante']; ?></td>
		</tr>

</table>

<!-- Informacion del vehículo-->
<h3>Información del vehículo</h3>
<hr>
<table style="align="center" border="1" height=60 width="100%" cellpadding="0" cellspacing="0"">
	<tr>
		<th>Número de placa</th>
		<th>Número de tarjeta de circulación</th>
		<th>Modelo</th>
		<th>Color</th>
		<th>Variante de color</th>
		<th>Tipo</th>
		<th>Marca</th>
	</tr>
		<tr>
			<td><?php echo $a['placa']; ?></td>
			<td><?php echo $a['tarjeta_circulacion']; ?></td>
			<td><?php echo $a['modelo']; ?></td>
			<td><?php echo $a['color']; ?></td>
			<td><?php echo $a['color_variante']; ?></td>
			<td><?php echo $a['tipo']; ?></td>
			<td><?php echo $a['marca']; ?></td>
		</tr>
</table>
<br>
	<!-- observaciones-->

<table style="align="center" border="1" height=60 width="100%" cellpadding="0" cellspacing="0"">
	<tr>
		<th>Obsevaciones</th>
	</tr>
		<tr>
			<td align="center"><?php echo $a['descripcion_ruta']; ?></td>
		</tr>
</table>		<div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
	</div>
</div>
<?php } ?>
</body>
</html>
