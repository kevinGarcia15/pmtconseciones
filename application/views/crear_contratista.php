<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
?><!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<title>Ingresar Contratista</title>
</head>
<body>

<div id="container">
	<?php $this->load->view('menu'); ?>
	<header>
		<h1><img width="70" src="<?=$base_url?>/recursos/img/logo.png"/> Ingreso de datos del contratista</h1>
	</header>

	<div  id="body">
		<form  id="subir" action="<?=$base_url?>/contratista/crearContratista" method="POST">
			<table class="table table-bordered" border="1">
				<tr>
					<td><strong>Ingrese No. de documento DPI<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input onchange="return llenar()" id="cui" type="number" class="form-control"
							placeholder="CUI" name="CUI_contratista" min="999999999999" required
							value="<?php if ($flag == 1){echo $result[0]['cui'];}else {echo $CUI_contratista;} ?>">
					</td>
				</tr>
				<tr>
					<td><strong>Nombre<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input id="names" type="text" class="form-control" placeholder="Nombre" name="nombre_contratista"
							required maxlength="50" size="50" <?php echo $activar; ?> value="<?php if ($flag == 1){echo $result[0]['nombre'];} ?>">
					</td>
				</tr>
				<tr>
					<td><strong>Apellido<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input id="names" style="text-transform: capitalize;"type="text" class="form-control" placeholder="Apellido" name="apellido_contratista"
							required maxlength="50" size="50" <?php echo $activar//activa o desactiva el input; ?> value="<?php if ($flag == 1){echo $result[0]['apellido'];} ?>">
					</td>
				</tr>
				<tr>
					<td><strong>Fecha de nacimiento<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input id="fecha" onchange="validarFecha()" type="date" class="form-control" name="fecha_nacimiento_contratista"
							<?php echo $activar; ?> required value="<?php if ($flag == 1){echo $result[0]['fecha_nacimiento'];}?>">
					</td>
				</tr>
				<tr>
					<td><strong>Números de teléfono</strong></td>
					<td>
						<input type="number" required class="form-control" min="10000000" max="99999999" placeholder="Número de teléfono" name="telefono_contratista"
					 		<?php echo $activar; ?> value="<?php if ($flag == 1){echo $result[0]['telefono'];}?>"><br>
						<input type="number" class="form-control" min="10000000" max="99999999" placeholder="ingrese otro número (opcional)" name="telefono2_contratista"
						 	<?php echo $activar; ?> value="<?php if ($flag == 1){echo $result[0]['telefono2'];}?>">
					</td>
				</tr>
				<tr>
					<td><strong>Seleccionar Municipio</strong></td>
					<td>
						<select class="custom-select" name="municipio" id="municipio">
							<option value="0">Seleccionar</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><strong>Seleccionar Aldea o Caserío</strong></td>
					<td>
						<select class="custom-select" name="aldea" id="aldea">
							<option value="0">Seleccionar</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><strong>Ingrese lugar de domicilio<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="text" class="form-control" placeholder="Domicilio" name="domicilio_contratista"
							<?php echo $activar; ?> required value="<?php if ($flag == 1){echo $result[0]['domicilio'];}?>">
					</td>
				</tr>
				</tr>
			</table>
			<td colspan="2">
				<input class="btn btn-primary btn-md"  role="button"  type="submit" required name="continuar" value="continuar">
				<input class="btn btn-warning btn-md"  role="button"  type="reset" required name="Reset" value="Reset">
				<input name="flag" type="hidden" value="<?php echo $flag; ?>">
				<input name="id_contratista" type="hidden" value="<?php if (isset($result[0]['id_contratista'])) {echo $result[0]['id_contratista'];} ?>">
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
//funcion Ajax para buscar en base de datos
$(function(){
	$.post('<?=$base_url?>/consecion/municipio').done(function(respuesta){
		$('#municipio').html(respuesta);
	});

	//lista de Aldeas o caserios
	$('#municipio').change(function(){
		var el_municipio = $(this).val();

		$.post('<?=$base_url?>/consecion/aldea',{municipio: el_municipio}).done(function(respuesta){
			$('#aldea').html(respuesta);
		});
	});

	//listar de Municipios
	$('#departamento').change(function(){
		var id_depto = $(this).val();

		$.post('<?=$base_url?>/corredor/municipio',{departamento: id_depto}).done(function(respuesta){
			$('#municipio').html(respuesta);
		});
	});
})

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

function llenar(){
	let cui = document.getElementById('cui').value
	window.location.href = '<?=$base_url?>/contratista/crearContratista?cui='+cui+'';
}

</script>
</html>
