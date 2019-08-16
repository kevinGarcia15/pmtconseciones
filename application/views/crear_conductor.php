<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
?><!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<title>Ingresar Conductor</title>
</head>
<body>

<div id="container">
	<?php $this->load->view('menu'); ?>
	<header>
		<h1><img width="70" src="<?=$base_url?>/recursos/img/logo.png"/> Ingreso de datos del piloto</h1>
	</header>

	<div  id="body">
		<form  id="subir" action="<?=$base_url?>/conductor/crearConductor" method="POST">
			<table border="1">
				<tr>
					<td><strong>Ingrese No. de licencia<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="number" class="form-control"
							placeholder="No. Licencia" name="numero_licencia" min="999999999999" required
							value="<?php $numero_licencia ?>">
					</td>
				</tr>
				<tr>
					<td><strong>Nombre<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="text" class="form-control" placeholder="Nombre" name="nombre"
							required maxlength="50" size="50" value="<?php $nombre?>">
					</td>
				</tr>
				<tr>
					<td><strong>Apellido<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="text" class="form-control" placeholder="Apellido" name="apellido"
							required maxlength="50" size="50" value="<?php $apellido ?>">
					</td>
				</tr>
				<tr>
					<td><strong>Fecha de nacimiento<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input id="fecha" onchange="validarFecha()" type="date" class="form-control" name="fecha_nacimiento"
						 required value="<?php $fecha_nacimiento ?>">
					</td>
				</tr>
				<tr>
					<td><strong>Seleccionar el tipo de licencia</strong></td>
					<td>
						<select class="custom-select" name="tipo_licencia">
							<?php foreach ($licencia as $key) {?>
							<option value="<?php echo $key['id_tipo']; ?>"><?php echo $key['tipo']; ?></option>
							<?php	} ?>
						</select>
					</td>
				</tr>
				<tr>
					<td><strong>Teléfono</strong></td>
					<td>
						<input type="number" class="form-control" min="10000000" max="99999999" placeholder="Número de teléfono" name="telefono"
					 	 value="<?php $telefono ?>">
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
					<td><strong>Ingrese lugar de domicilio</strong></td>
					<td>
						<input type="text" class="form-control" placeholder="Domicilio" name="domicilio"
							required value="<?php $domicilio ?>">
					</td>
				</tr>
				</tr>
			</table>
			<td colspan="2">
				<input class="btn btn-primary btn-md"  role="button"  type="submit" required name="continuar" value="continuar">
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
	window.location.href = '<?=$base_url?>/consecion/crearContratista?cui='+cui+'';
}
</script>
</html>
