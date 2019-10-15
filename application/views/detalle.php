<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
if (count($arr) < 1) {
	$mensaje = "No hay usuarios activos!";
}

if ($this->session->ROL == 'Administrador') {
	$thead="<th>Acciones</th>";
	$hidenL= "";
	$hidenR= "";
}else {
	$thead="";
	$hidenL= "<!--";//comenta el elemento del boton editar
	$hidenR= "-->";
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
		<h4>Código de la conseción: <?php echo $a['numero']; ?> </h4>
		<h5>Fecha de inserción: <?php echo $a['creado']; ?> </h5>
		<br><br>
		<div class="">
			<!-- informacion de la concesion-->
			<h5>Información de la concesión</h5>
			<hr><br>
			<div class="table-responsive">
				<table class="table table-bordered">
				<thead>
					<th>Tarifa</th>
					<th>Horario inicio de labores </th>
					<th>Horario fin de labores</th>
					<th>Ruta</th>
					<th>lugar de parqueo</th>
					<?php echo $thead; ?>
				</thead>
				<tbody>
					<tr>
						<td><?php echo "Q.".$a['tarifa']; ?></td>
						<td><?php echo $a['h_inicio']; ?></td>
						<td><?php echo $a['h_fin']; ?></td>
						<td><?php echo $a['ruta']; ?></td>
						<td><?php echo $a['parqueo']; ?></td>
						<!--comenta el boton  en caso que sea un usuario-->
					<?php echo $hidenL;?>
						<td><a class='btn btn-secondary' href="<?=$base_url?>/consecion/editar/<?php echo $id_concesion ?>">Editar</a></td>
					<?php echo $hidenR;?>
					</tr>
				</tbody>
			</table>
		</div>
			<br><br>
			<!-- Datos del contratista-->
			<h5>Información del contratista</h5>
			<hr><br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<th>No. documento DPI</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Fecha de nacimiento</th>
					<th>Teléfono</th>
					<th>Teléfono No. 2</th>
					<th>Domicilio</th>
					<th>Canton/Aldea</th>
					<th>Municipio</th>
					<?php echo $thead; ?>
				</thead>
				<tbody>
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
						<?php echo $hidenL;?>
							<td><a class='btn btn-secondary' href="<?=$base_url?>/contratista/editar/<?php echo $a['cui_contra']; ?>">Editar</a></td>
						<?php echo $hidenR;?>
				</tr>
				</tbody>
			</table>
		</div>
			<br><br>
		<!-- Informacion del pilotp-->
			<h5>Información del piloto</h5>
			<hr><br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<th>No. de licencia</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Fecha de nacimiento</th>
					<th>Tipo de licencia</th>
					<th>Teléfono</th>
					<th>Domicilio</th>
					<th>Municipio</th>
					<th>Departamento</th>
					<?php echo $thead; ?>
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
						<td><?php echo $a['mun_pil']; ?></td>
						<td><?php echo $a['depto_pil']; ?></td>
						<?php echo $hidenL;?>
							<td><a class='btn btn-secondary' href="<?=$base_url?>/conductor/editar/<?php echo $a['licencia']; ?>">Editar</a></td>
						<?php echo $hidenR;?>
					</tr>
				</tbody>
			</table>
		</div>
			<br><br>
		<!-- Informacion del ayudante-->
			<h5>Información del ayudante</h5>
			<hr><br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<th>No. de documento DPI</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Fecha de nacimiento</th>
					<th>Teléfono</th>
					<th>Domicilio</th>
					<th>Municipio</th>
					<th>Departamento</th>
					<?php echo $thead; ?>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $a['cui_ayudante']; ?></td>
						<td><?php echo $a['nombre_ayudante']; ?></td>
						<td><?php echo $a['apellido_ayudante']; ?></td>
						<td><?php echo $a['nacimiento_ayudante']; ?></td>
						<td><?php echo $a['telefono_ayudante']; ?></td>
						<td><?php echo $a['domicilio_ayudante']; ?></td>
						<td><?php echo $a['mun_ayudante']; ?></td>
						<td><?php echo $a['depto_ayudante']; ?></td>
						<?php echo $hidenL;?>
							<td><a class='btn btn-secondary' href="<?=$base_url?>/ayudante/editar/<?php echo $a['id_consecion']; ?>">Editar</a></td>
						<?php echo $hidenR;?>
					</tr>
				</tbody>
			</table>
		</div>
			<br><br>
			<!-- Informacion del vehículo-->
			<h5>Información del vehículo</h5>
			<hr><br>
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<th>Número de placa</th>
					<th>Número de tarjeta de circulación</th>
					<th>Modelo</th>
					<th>Color</th>
					<th>Variante de color</th>
					<th>Tipo</th>
					<th>Marca</th>
					<?php echo $thead; ?>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $a['placa']; ?></td>
						<td><?php echo $a['tarjeta_circulacion']; ?></td>
						<td><?php echo $a['modelo']; ?></td>
						<td><?php echo $a['color']; ?></td>
						<td><?php echo $a['color_variante']; ?></td>
						<td><?php echo $a['tipo']; ?></td>
						<td><?php echo $a['marca']; ?></td>
						<?php echo $hidenL;?>
							<td><a class='btn btn-secondary' href="<?=$base_url?>/vehiculo/editar/<?php echo $a['id_consecion']; ?>">Editar</a></td>
						<?php echo $hidenR;?>
					</tr>
				</tbody>
			</table>
		</div>

			 <br><br>
				<!-- Informacion del vehículo-->
			<br>
		<div class="table-responsive">
			<table style="text-align: center" class="table table-bordered">
				<thead>
					<th>Obsevaciones</th>
				</thead>
				<tbody>
					<tr>
						<td><strong>De la ruta: </strong><?php echo $a['descripcion_ruta']; ?></td>
					</tr>
					<tr>
						<td><strong>De la conseción: </strong><?php echo $a['descripcion']; ?></td>
					</tr>
				</tbody>
			</table>
		</div>
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
