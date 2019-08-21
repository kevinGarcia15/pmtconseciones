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
						<input type="text" class="form-control" placeholder="Placas"  name="$numero_placa" required value="">
					</td>
				</tr>
				<tr>
					<td><strong>Seleccione el modelo</strong></td>
					<td>
						<select class="custom-select" name="modelo">
							<?php
							$año_inicio  = '1950';
							$años_actual = date("Y");
							while ($año_inicio < $años_actual) { $año_inicio = $año_inicio + 1; ?>
								<option value=""><?php echo "$año_inicio"; ?></option>
							<?php } ?>
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

function validarFecha()
{
	var hoy = new Date();
	let fecha_form_usuario = document.getElementById('fecha').value;
	let fecha_form = new Date(fecha_form_usuario);

// Comparamos solo las fechas => no las horas!!
hoy.setHours(0,0,0,0);  // Lo iniciamos a 00:00 horas

if (fecha_form >= hoy) {
  alert('Fecha no valida');
	  document.getElementById("fecha").value = "";
}
else {

}
}

</script>
</html>
