<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
if (count($arr) < 1) {
	$mensaje = "No hay usuarios activos!";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<title>Detalle</title>
</head>
<body>
<div id="container">
	<?php $this->load->view('menu'); ?>
	<header>
		<h1><img width="70" src="<?=$base_url?>/recursos/img/logo.png"/>Detalle</h1>
	</header>

	<div id="body">
<?php foreach ($arr as $a) {?>
		<h4>Conseción número: <?php echo $a['numero']; ?> </h4>
		<hr>
		<h5>Fecha de inserción: <?php echo $a['creado']; ?> </h5>
		<div class="">
			<h5>Información del contratista</h5>
			<hr><br>
			<table class="table table-bordered">
				<thead>
					<!-- Datos del contratista-->
					<th>No. documento DPI</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Fecha de nacimiento</th>
					<th>Teléfono</th>
					<th>Domicilio</th>
					<th>Canton/Aldea</th>
					<th>Municipio</th>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $a['cui_contra']; ?></td>
						<td><?php echo $a['nombre_contratista']; ?></td>
						<td><?php echo $a['apellido_contra']; ?></td>
						<td><?php echo $a['nacimiento_contra']; ?></td>
						<td><?php echo $a['telefono_contra']; ?></td>
						<td><?php echo $a['domicilio_contra']; ?></td>
						<td><?php echo $a['cantald_contra']; ?></td>
						<td><?php echo $a['mun_contra']; ?></td>
					</tr>
				</tbody>
			</table>
			<br><br>
		<!-- Informacion del pilotp-->
			<h5>Información del piloto</h5>
			<hr><br>
			<table class="table table-bordered">
				<thead>
					<th>No. de licencia</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Fecha de nacimiento</th>
					<th>Tipo de licencia</th>
					<th>Teléfono</th>
					<th>Domicilio</th>
					<th>Canton/Aldea</th>
					<th>Municipio</th>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $a['licencia']; ?></td>
						<td><?php echo $a['nombre_piloto']; ?></td>
						<td><?php echo $a['apellido_piloto']; ?></td>
						<td><?php echo $a['nacimiento_piloto']; ?></td>
						<td><?php echo $a['tipo_lice']; ?></td>
						<td><?php echo $a['telefono_piloto']; ?></td>
						<td><?php echo $a['domicilio_piloto']; ?></td>
						<td><?php echo $a['cant_piloto']; ?></td>
						<td><?php echo $a['mun_contra']; ?></td>
					</tr>
				</tbody>
			</table>
			<br><br>
		<!-- Informacion del ayudante-->
			<h5>Información del ayudante</h5>
			<hr><br>
			<table class="table table-bordered">
				<thead>
					<th>No. de documento DPI</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Fecha de nacimiento</th>
					<th>Domicilio</th>
					<th>Canton/Aldea</th>
					<th>Municipio</th>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $a['cui_ayudante']; ?></td>
						<td><?php echo $a['nombre_ayudante']; ?></td>
						<td><?php echo $a['apellido_ayudante']; ?></td>
						<td><?php echo $a['nacimiento_ayudante']; ?></td>
						<td><?php echo $a['domicilio_ayudante']; ?></td>
						<td><?php echo $a['cantald_ayudante']; ?></td>
						<td><?php echo $a['mun_ayudante']; ?></td>
					</tr>
				</tbody>
			</table>
			<br><br>
			<!-- Informacion del vehículo-->
			<h5>Información del vehículo</h5>
			<hr><br>
			<table class="table table-bordered">
				<thead>
					<th>Número de placa</th>
					<th>Modelo</th>
					<th>Color</th>
					<th>Tipo</th>
					<th>Marca</th>
					<th>Otros</th>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $a['placa']; ?></td>
						<td><?php echo $a['modelo']; ?></td>
						<td><?php echo $a['color']; ?></td>
						<td><?php echo $a['tipo']; ?></td>
						<td><?php echo $a['marca']; ?></td>
						<td><?php echo $a['descripcion_color']; ?></td>
					</tr>
				</tbody>
			</table>
			 <br><br>
				<!-- Informacion del vehículo-->
			<br>
			<table style="text-align: center" class="table table-bordered">
				<thead>
					<th>Obsevaciones</th>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $a['descripcion_ruta']; ?></td>
					</tr>
				</tbody>
			</table>
		</div>

    <br><a class='btn btn-primary btn-md' href="<?=$base_url?>/inicio/">Listo</a>
		<a class='btn btn-primary btn-md' href="<?=$base_url?>/informes/descargar/<?php echo $a['id_consecion'] ; ?>">Descargar</a>
    <div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
<?php } ?>
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
