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
						<div class="row">
							<div class="col-2">
								<select class="custom-select" name="inicial">
									<option value="C">C</option>
									<option value="M">M</option>
									<option value="P">P</option>
									<option value="U">U</option>
								</select>
							</div>
							<div class="col-10">
								<input type="text" class="form-control" placeholder="Placas" maxlength="6" minlength="6" name="placas_vehiculo" required value="<?php $placas_vehiculo ?>">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td><strong>Ingrese No. de tarjeta de circulación<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="number" class="form-control" placeholder="Número" min="1000000" name="tarjeta_circulacion" required value="<?php $tarjeta_circulacion?>">
					</td>
				</tr>
				<tr>
					<td><strong>Seleccione el modelo</strong></td>
					<td>
						<select class="custom-select" name="modelo_vehiculo">
							<?php
							$año_inicio  = '1980';
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
						<div class="row">
							<div class="col-2">
								<select class="custom-select" name="color_id_color_vehiculo">
									<?php foreach ($color as $key) {?>
									<option value="<?php echo $key['id_color']; ?>"><?php echo $key['color']; ?></option>
									<?php	} ?>
								</select>							</div>
							<div class="col-9">
								<input type="text" class="form-control" placeholder="Variante" maxlength="100"  name="color_variante" value="<?php $color_variante ?>">
							</div>
							<div class="col-1">
								<img type="button" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" src="<?=$base_url?>/recursos/img/plus.png" style="width: 24px;" alt=""><br>
							</div>
						</div>
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
				</tr>
			</table>
			<td colspan="2">
				<input class="btn btn-primary btn-md"  role="button"  type="submit" required name="continuar" value="continuar">
				<input class="btn btn-warning btn-md"  role="button"  type="reset" required name="Reset" value="Reset">
			</td>
		</form>
		<!-- incio formulario color-->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel" style="color:white;">Nuevo Color</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="subir" action="<?=$base_url?>/vehiculo/crearColor/" method="POST">
							<div class="form-group">
								<label for="recipient-name" class="col-form-label" style="color:white;">Ingrese el nombre del color</label>
								<input type="text" class="form-control" id="recipient-name" name="color" value="<?php $color ?>">
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal" style="color:white;">Cerrar</button>
								<button  type="submit" class="btn btn-primary" name="guardar" value="Guardar" style="color:white;">Guardar</button>
								<?php $ruta ?>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
			<!--Fin formulario color-->
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
