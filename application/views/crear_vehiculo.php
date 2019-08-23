<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
?><!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<title>Ingresar Vehiculo</title>
</head>
<body>

<div id="container">
	<?php $this->load->view('menu'); ?>
	<header>
		<h1><img width="70" src="<?=$base_url?>/recursos/img/logo.png"/> Ingreso de datos del vehiculo</h1>
	</header>

	<div  id="body">
		<form  id="subir" action="<?=$base_url?>/vehiculo/crearVehiculo" method="POST">
			<table class="table table-bordered" border="1">
				<tr>
					<td><strong>Ingrese No. de placas<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="text" class="form-control" placeholder="Placas"  name="placas_vehiculo" required value="<?php $placas_vehiculo ?>">
					</td>
				</tr>
				<tr>
					<td><strong>Seleccione el modelo</strong></td>
					<td>
						<select class="custom-select" name="modelo_vehiculo">
							<?php
							$año_inicio  = '1950';
							$años_actual = date("Y");
							while ($año_inicio < $años_actual) { $año_inicio = $año_inicio + 1; ?>
								<option value="<?php echo $año_inicio; ?>"><?php echo "$año_inicio"; ?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td><strong>Seleccionar color del Vehículo</strong></td>
					<td>
						<select class="custom-select" name="color_id_color_vehiculo">
							<?php foreach ($color as $key) {?>
							<option value="<?php echo $key['id_color']; ?>"><?php echo $key['color']; ?></option>
							<?php	} ?>
						</select>
					</td>
				</tr>
				<tr>
					<td><strong>Seleccionar el tipo de vehículo</strong></td>
					<td>
						<select class="custom-select" name="tipo_id_tipo_vehiculo">
							<?php foreach ($tipo as $key) {?>
							<option value="<?php echo $key['id_tipo']; ?>"><?php echo $key['tipo_vehiculo']; ?></option>
							<?php	} ?>
						</select>
					</td>
				</tr>
				<tr>
					<td><strong>Seleccionar la marca del vehículo</strong></td>
					<td>
						<select class="custom-select" name="marca_id_marca_vehiculo">
							<?php foreach ($marca as $key) {?>
							<option value="<?php echo $key['id_marca']; ?>"><?php echo $key['nombre']; ?></option>
							<?php	} ?>
						</select>
					</td>
				</tr>
				<?php
					 print_r($this->session->userdata());
				?>
				</tr>
			</table>
			<td colspan="2">
				<input class="btn btn-primary btn-md"  role="button"  type="submit" required name="continuar" value="continuar">
				<input class="btn btn-warning btn-md"  role="button"  type="reset" required name="Reset" value="Reset">
			</td>
		</form>
		<?php $mensaje ?>
		<div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
	</div>
	<hr><hr><hr>
	<footer><?php $this->load->view('footer') ?></footer>
</div>
</body>


<script type="text/javascript">
</script>
</html>
