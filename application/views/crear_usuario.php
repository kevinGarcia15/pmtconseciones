<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
?><!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<title>Crear Usuario</title>
</head>
<body>

<div id="container">
	<?php $this->load->view('menu'); ?>
	<header>
		<h1><img width="70" src="<?=$base_url?>/recursos/img/logo.png"/>Crear Usuario</h1>
	</header>

	<div  id="body">
		<form  id="subir" action="<?=$base_url?>/usuario/crear/" method="POST">
			<table border="1">
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
				<tr>
					<td><strong>Ingrese contraseña<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="password" class="form-control" placeholder="Password" name="clave" required value="<?=$clave?>">
					</td>
				</tr>
				<tr>
					<td><strong>Repita contraseña<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="password" class="form-control" placeholder="Password" name="clave2" required value="<?=$clave2?>">
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input  class="btn btn-primary btn-md" role="button" name="guardar" type="submit" value="Guardar">
					</td>
				</tr>
			</table>
		</form>
		<div class="alert alert-danger" onclick="$(this).hide(1000)"><?=$mensaje?></div>
	</div>

	<footer><?php $this->load->view('footer') ?></footer>
</div>

</body>
<script type="text/javascript">
</script>
</html>
