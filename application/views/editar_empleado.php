<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";


foreach ($arr as $key) {
	$nombre = $key['nombre'];
	$apellido = $key['apellido'];
	$usuario = $key['usuario'];
	$CUI = $key['cui'];
	$fecha_nacimiento = $key['nacimiento'];
	$cargo = $key['cargo'];
	$rol = $key['rol'];
	$id_empleado = $key['id_empleado'];
	$persona_id_persona = $key['persona_id_persona'];
}
?><!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<title>Editar Usuario</title>
</head>
<body>

<div id="container">
	<?php $this->load->view('menu'); ?>
	<header>
		<h1><img width="70" src="<?=$base_url?>/recursos/img/logo.png"/> Editar Usuario</h1>
	</header>

	<div  id="body">
		<form  action="<?=$base_url?>/usuario/editar/" method="POST">
			<table class="table table-bordered">
				<tr>
					<td><strong>Nombre<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="text" class="form-control" placeholder="Nombre" name="nombre" required maxlength="50" size="50" value="<?=$nombre?>">
					</td>
				</tr>
				<tr>
					<td><strong>Apellido<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="text" class="form-control" placeholder="Apellido" name="apellido" required maxlength="50" size="50" value="<?=$apellido?>">
					</td>
				</tr>
				<tr>
					<td><strong>Usuario<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="text" class="form-control" placeholder="Usuario" name="usuario" required value="<?=$usuario?>">
					</td>
				</tr>
				<tr>
					<td><strong>Ingrese No. de documento DPI<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="number" class="form-control" placeholder="CUI" name="CUI" required value="<?=$CUI?>">
					</td>
				</tr>
				<tr>
					<td><strong>Fecha de nacimiento<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="date" class="form-control"  name="fecha_nacimiento" required value="<?=$fecha_nacimiento?>">
					</td>
				</tr>
				<tr>
					<td><strong>Cargo que desempeña<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="text" class="form-control" placeholder="Cargo" name="cargo" required value="<?=$cargo?>">
					</td>
				</tr>
				<tr>
					<td><strong>Seleccione el Rol del Usuario</strong></td>
					<td>
						<select class="custom-select" name="rol">
							<option value="Administrador">Administrador</option>
							<option value="Usuario">Usuario</option>
						</select>
					</td>
				</tr>
					<td colspan="2">
						<input  type="hidden"  name="id_empleado" value="<?=$id_empleado?>">
						<input  type="hidden"  name="persona_id_persona" value="<?=$persona_id_persona?>">
						<input class="btn btn-primary btn-md" type="submit" role="button" name="actualizar" value="actualizar">
					</td>
				</tr>
			</table>
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
