<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
?><!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<title>Ingresar Conseción</title>
</head>
<body>

<div id="container">
	<?php $this->load->view('menu'); ?>
	<header>
		<h1><img width="70" src="<?=$base_url?>/recursos/img/logo.png"/> Actualizar</h1>
	</header>

	<div  id="body">
		<form  id="subir" action="<?=$base_url?>/consecion/editar/" method="POST">
			<h1>Actualizar concesión</h1>
			<?php foreach ($arr as $a) {?>

			<table class="table table-bordered" border="1">
				<tr>
					<td><strong>Ingrese No. de la concesión<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="text" class="form-control" placeholder="número" name="numero_consecion" min="100" required value="<?=$a['numero']?>">
					</td>
				</tr>
				<tr>
					<td><strong>Seleccionar la ruta que cubre</strong></td>
					<td>
						<div class="row">
							<div class="col-8">
								<select class="custom-select" name="ruta_id_ruta">
									<?php foreach ($ruta as $key) {?>
										<?php if ($a['ruta_id_ruta'] == $key['id_ruta']){ ?>
											<option selected value="<?php echo $key['id_ruta']; ?>"><?php echo $key['nombre']; ?></option>
										<?php }else{ ?>
										<option  value="<?php echo $key['id_ruta']; ?>"><?php echo $key['nombre']; ?></option>
									<?php } ?>
									<?php	} ?>
								</select>
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<tr>
						<td><strong>Ingrese su lugar de parqueo<strong style="color: red; font-size: 20px">*</strong></strong></td>
						<td>
							<input type="text" class="form-control" placeholder="Lugar" name="parqueo"
								required maxlength="50" size="50"  value="<?=$a['parqueo']?>">
						</td>
					</tr>
					<td><strong>Ingrese la tarifa<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<div class="row">
							<div class="col-8">
								<input type="number" step="any" min="0"class="form-control" placeholder="Tarifa báse" required name="tarifa"  value="<?=$a['tarifa']?>">
							</div>
							<div class="col-4">
								Quetzales
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td><strong>Ingrese horarios<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<div class="row">
							<div class="col-2">
								horario de inicio
							</div>
							<div class="col-2">
								<input type="time" min="00:00:00" max="11:59:59" class="form-control"  name="horario_inicio"  required value="<?=$a['hora_inicio']?>">
							</div>
							<div class="col-2">
								horario Fin
							</div>
							<div class="col-2">
								<input type="time" min="12:00:00" max="23:59:59" class="form-control"  name="horario_fin" required value="<?=$a['hora_fin']?>">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td><strong>Observaciones</strong></td>
					<td>
						<textarea class="form-control" id="message-text" name="descripcion" value="<?=$a['descripcion']?>"></textarea>
					</td>
				</tr>
				</tr>
			</table>
			<input  type="hidden"  name="id_consecion" value="<?=$a['id_consecion']?>">
				<?php } ?>
			<td colspan="2">
				<input class="btn btn-primary btn-md" type="submit" role="button" name="actualizar" value="Actualizar">
				<input class="btn btn-danger btn-md"  type="submit" role="button" name="cancelar" value="Cancelar">
			</td>
		</form>
		<?php $mensaje ?>
		<div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
	</div>

	<footer><?php $this->load->view('footer') ?></footer>
</div>

</body>


<script type="text/javascript">
</script>
</html>
