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

th, td { padding: 5px; }

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

p.footer {
	text-align: right;
	font-size: 11px;
	border-top: 1px solid #D0D0D0;
	line-height: 32px;
	padding: 0 10px 0 10px;
	margin: 20px 0 0 0;
}

#container {
	margin: -38px;
	border: 0px solid #D0D0D0;
	box-shadow: 0 0 0px #D0D0D0;
}

.bs-callout {
		padding: 20px;
		margin: 20px 0;
		border: 1px solid #eee;
		border-left-width: 5px;
		border-radius: 3px;
}
.bs-callout h4 {
		margin-top: 0;
		margin-bottom: 5px;
}
.bs-callout p:last-child {
		margin-bottom: 0;
}
.bs-callout code {
		border-radius: 3px;
}
.bs-callout+.bs-callout {
		margin-top: -5px;
}
.bs-callout-default {
		border-left-color: #777;
}
.bs-callout-default h4 {
		color: #777;
}
.bs-callout-primary {
		border-left-color: #428bca;
}
.bs-callout-primary h4 {
		color: #428bca;
}
.bs-callout-success {
		border-left-color: #5cb85c;
}
.bs-callout-success h4 {
		color: #5cb85c;
}
.bs-callout-danger {
		border-left-color: #d9534f;
}
.bs-callout-danger h4 {
		color: #d9534f;
}
.bs-callout-warning {
		border-left-color: #f0ad4e;
}
.bs-callout-warning h4 {
		color: #f0ad4e;
}
.bs-callout-info {
		border-left-color: #5bc0de;
}
.bs-callout-info h4 {
		color: #5bc0de;
}
/* Footer */

section {
		padding: 60px 0;
}

section .section-title {
		text-align: center;
		color: #007b5e;
		margin-bottom: 50px;
		text-transform: uppercase;
}
#footer {
		background: #007b5e !important;
}
#footer h5{
	padding-left: 10px;
		border-left: 3px solid #eeeeee;
		padding-bottom: 6px;
		margin-bottom: 20px;
		color:#ffffff;
}
#footer a {
		color: #ffffff;
		text-decoration: none !important;
		background-color: transparent;
		-webkit-text-decoration-skip: objects;
}
#footer ul.social li{
	padding: 3px 0;
}
#footer ul.social li a i {
		margin-right: 5px;
	font-size:25px;
	-webkit-transition: .5s all ease;
	-moz-transition: .5s all ease;
	transition: .5s all ease;
}
#footer ul.social li:hover a i {
	font-size:30px;
	margin-top:-10px;
}
#footer ul.social li a,
#footer ul.quick-links li a{
	color:#ffffff;
}
#footer ul.social li a:hover{
	color:#eeeeee;
}
#footer ul.quick-links li{
	padding: 3px 0;
	-webkit-transition: .5s all ease;
	-moz-transition: .5s all ease;
	transition: .5s all ease;
}
#footer ul.quick-links li:hover{
	padding: 3px 0;
	margin-left:5px;
	font-weight:700;
}
#footer ul.quick-links li a i{
	margin-right: 5px;
}
#footer ul.quick-links li:hover a i {
		font-weight: 700;
}

@media (max-width:767px){
	#footer h5 {
		padding-left: 0;
		border-left: transparent;
		padding-bottom: 0px;
		margin-bottom: 10px;
}
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
	<h2>No. de conseción <?php echo $a['numero']; ?></h2>
	<h4><?php echo "Fecha de impresión " . date("d") . " del " . date("m") . " de " . date("Y"); ?> </h4>
	<div id="body">
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
		<th>Domicilio</th>
		<th>Municipio</th>
		<th>Departamento</th>
	</tr>

		<tr>
			<td><?php echo $a['cui_ayudante']; ?></td>
			<td><?php echo $a['nombre_ayudante']; ?></td>
			<td><?php echo $a['apellido_ayudante']; ?></td>
			<td><?php echo $a['nacimiento_ayudante']; ?></td>
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
		<th>Modelo</th>
		<th>Color</th>
		<th>Variante de color</th>
		<th>Tipo</th>
		<th>Marca</th>
	</tr>

		<tr>
			<td><?php echo $a['placa']; ?></td>
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
