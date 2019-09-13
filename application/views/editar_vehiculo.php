<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
?><!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<title>Actualizar Vehiculo</title>
</head>
<body>

<div id="container">
	<?php $this->load->view('menu'); ?>
	<header>
		<h1><img width="70" src="<?=$base_url?>/recursos/img/logo.png"/>Actualizar Vehículo</h1>
	</header>
<?php foreach ($vehiculo as $a) {?>
	<div  id="body">
		<form  id="subir" action="<?=$base_url?>/vehiculo/editar" method="POST">
			<table class="table table-bordered" border="1">
				<tr>
					<td><strong>Ingrese No. de placas<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<div class="row">
							<div class="col-2">
								<select class="custom-select" name="inicial">
									<?php $tipo = substr($a['placa'],0,1);//substrae la primera letra de una canton_aldea_id_canton_aldea
											$inicial = array('C','M','P','U');
											for ($i=0; $i <4 ; $i++) {
												if ($tipo == $inicial[$i]){ ?>
													<option selected value="<?php echo $inicial[$i]; ?>"><?php echo $inicial[$i]; ?></option>
													<?php }else{?>
													<option value="<?php echo $inicial[$i]; ?>"><?php echo $inicial[$i]; ?></option>
										<?php } ?>
								<?php }?>
								</select>
							</div>
							<div class="col-10">
								<input type="text" class="form-control" onkeyup="mayus(this);" placeholder="Placas" maxlength="6" minlength="6"
								name="placas_vehiculo" required value="<?php echo substr($a['placa'],1,7); ?>">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td><strong>Ingrese No. de tarjeta de circulación<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="number" class="form-control" placeholder="Número" min="1000000" name="tarjeta_circulacion"
						required value="<?php echo $a['tarjeta_circulacion'];?>">
					</td>
				</tr>
				<tr>
					<td><strong>Seleccione el modelo</strong></td>
					<td>
						<select class="custom-select" name="modelo_vehiculo">
							<?php
							$año_inicio  = '1980';
							$años_actual = date("Y");
							$modelo = array();
							while ($año_inicio <= $años_actual) {
								$año_inicio = $año_inicio + 1;
								$modelo[] = $año_inicio;
							}
							foreach ($modelo as $key) {
								 if ($a['modelo']== $key) {
									echo '<option selected value='."$key".'>'.$key.'</option>';
								 }else{
									echo '<option value='."$key".'>'.$key.'</option>';
									 }
								 }
							?>
						</select>
					</td>
				</tr>
				<tr>
					<td><strong>Seleccionar color del Vehículo</strong></td>
					<td>
						<div class="row">
							<div class="col-2">
								<select class="custom-select" name="color_id_color_vehiculo">
									<?php foreach ($color as $key) {
										if ($a['color'] == $key['color']) {
											echo '<option selected value='."$key[id_color]".'>'.$key['color'].'</option>';
										}else {
											echo '<option value='."$key[id_color]".'>'.$key['color'].'</option>';
										}
								}?>
								</select>
								</div>
							<div class="col-9">
								<input type="text" class="form-control" placeholder="Variante" maxlength="100"  name="color_variante" value="<?php echo $a['color_variante']; ?>">
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
							<?php foreach ($tipoVehiculo as $key) {
								if ($a['tipo'] == $key['tipo_vehiculo']) {
									echo '<option selected value='."$key[id_tipo]".'>'.$key['tipo_vehiculo'].'</option>';
								}else {
									echo '<option value='."$key[id_tipo]".'>'.$key['tipo_vehiculo'].'</option>';
								}
						}?>
						</select>
					</td>
				</tr>
				<tr>
					<td><strong>Seleccionar la marca del vehículo</strong></td>
					<td>
						<select class="custom-select" name="marca_id_marca_vehiculo">
							<?php foreach ($marca as $key) {
								if ($a['marca'] == $key['nombre']) {
									echo '<option selected value='."$key[id_marca]".'>'.$key['nombre'].'</option>';
								}else {
									echo '<option value='."$key[id_marca]".'>'.$key['nombre'].'</option>';
								}
						}?>
					</select>
					</td>
				</tr>
				</tr>
			</table>
			<td colspan="2">
				<input class="btn btn-primary btn-md"  role="button"  type="submit" required name="actualizar" value="Actualizar">
				<input class="btn btn-danger btn-md"  role="button"  type="submit"  name="cancelar" value="Cancelar">
				<input  type="hidden"  name="id_vehiculo" value="<?=$a['id_vehiculo']?>">
				<input  type="hidden"  name="id_consecion" value="<?=$a['id_consecion']?>">
			</td>
		<?php } ?><!-- fin del forehac para llenar los campos-->
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
//convierte el texto a mayusculas
function mayus(e) {
    e.value = e.value.toUpperCase();
}
</script>
</html>
