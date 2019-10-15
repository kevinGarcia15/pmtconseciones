<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<title>Informes</title>
</head>
<body>
<div id="container">
	<?php $this->load->view('menu'); ?>
	<header>
		<h1><img width="70" src="<?=$base_url?>/recursos/img/logo.png"/>Informes</h1>
	</header>

	<div id="body">
		<h4>Seleccione los titulo que desea mostrar</h4>
		<br><br>
<!--inicio de los checkbox de la concesion-->
			<h5>Información de la concesión</h5>
			<hr>
			<form  id="subir" action="<?=$base_url?>/informes/informe_categoria" method="POST">
			<div class="form-group row">
				<?php
				$titulo = ['Tarifa',' Horario inicio de labores ', ' Horario fin de labores ', 'Ruta'];//arreglo que contiene los titulo a seleccionar
				$campos = ['c.tarifa tarifa',' c.hora_inicio h_inicio', 'c.hora_fin h_fin', 'r.nombre ruta'];
				$cont = 0;
					foreach ($campos as $key) {?>
					<div class="col-sm-12">
						<div class="form-check">
							<label class="form-check-label" >
									<?php echo '<input class="form-check-input" type="checkbox" name="valor[]" value="'.$key.'"> '.$titulo[$cont].' '; ?>
							</label>
						</div>
					</div>
				<?php	$cont= $cont + 1;} ?>
			</div>
<!--fin de los checkbox de la concesion-->

	<br>
	<h5>Información del contratista</h5>
	<hr>
	<div class="form-group row">
		<?php $titulo = ['DPI','Nombre', 'Fecha de nacimiento', 'Teléfono', ' Teléfono No. 2 ', 'Domicilio', ' Canton/Aldea ', 'Municipio'];//arreglo que contiene los titulo a seleccionar
			foreach ($titulo as $key) {?>
			<div class="col-sm-12">
				<div class="form-check">
					<label class="form-check-label">
						<?php echo '<input class="form-check-input" type="checkbox" name="valor[]"> '.$key.' '; ?>
					</label>
				</div>
			</div>
		<?php	} ?>
	</div>
<!--fin de los checkbox del contratista-->

<br>
<h5>Información del piloto</h5>
<hr>
<div class="form-group row">
	<?php $titulo = ['Número de licencia','Nombre', 'Fecha de nacimiento', 'Tipo de licencia', ' Teléfono', 'Domicilio', 'Municipio', 'Departamento'];//arreglo que contiene los titulo a seleccionar
		foreach ($titulo as $key) {?>
		<div class="col-sm-12">
			<div class="form-check">
				<label class="form-check-label">
					<?php echo '<input class="form-check-input" type="checkbox" name="valor[]"> '.$key.' '; ?>
				</label>
			</div>
		</div>
	<?php	} ?>
	</div>
<!--fin de los checkbox de la contratista-->

<br>
<h5>Información del ayudante</h5>
<hr>
<div class="form-group row">
	<?php $titulo = ['DPI','Nombre', 'Fecha de nacimiento', 'Teléfono', 'Domicilio', 'Municipio', 'Departamento'];//arreglo que contiene los titulo a seleccionar
		foreach ($titulo as $key) {?>
		<div class="col-sm-12">
			<div class="form-check">
				<label class="form-check-label">
					<?php echo '<input class="form-check-input" type="checkbox" name="valor[]"> '.$key.' '; ?>
				</label>
			</div>
		</div>
	<?php	} ?>
	</div>
<!--fin de los checkbox de la contratista-->

<br>
<h5>Información del vehículo</h5>
<hr>
<div class="form-group row">
	<?php $titulo = ['Número de placa','Número de tarjeta de circulación', 'Modelo', 'Color', 'Tipo', 'Marca'];//arreglo que contiene los titulo a seleccionar
		foreach ($titulo as $key) {?>
		<div class="col-sm-12">
			<div class="form-check">
				<label class="form-check-label">
					<?php echo '<input class="form-check-input" type="checkbox" name="valor[]"> '.$key.' '; ?>
				</label>
			</div>
		</div>
	<?php	} ?>
	</div>
<!--fin de los checkbox del vehículo-->
	</div>
	<input class="btn btn-primary btn-md"  role="button" type="submit" name="continuar" value="continuar">
    <div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
	</form>
		<br><br><br>
		<footer><?php $this->load->view('footer') ?></footer>
	</div>
</div>
<script type="text/javascript">
	function consultaCategoría(){
		document.getElementById("selectCategoria").submit();
	}
 </script>
</body>
</html>
