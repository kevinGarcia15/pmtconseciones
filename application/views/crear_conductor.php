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
			<table class="table table-bordered" border="1">
				<tr>
					<td><strong>Ingrese No. de licencia<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input id="licencia" onchange="ValidarLicencia()" type="number" class="form-control"
							placeholder="No. Licencia" name="numero_licencia" min="1000000000000" max="9999999999999" required
							value="<?php $numero_licencia ?>">
					</td>
				</tr>
				<tr>
					<td><strong>Nombre<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="text" class="form-control" placeholder="Nombre" name="nombre_conductor"
							required maxlength="50" size="50" value="<?php $nombre?>">
					</td>
				</tr>
				<tr>
					<td><strong>Apellido<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="text" class="form-control" placeholder="Apellido" name="apellido_conductor"
							required maxlength="50" size="50" value="<?php $apellido ?>">
					</td>
				</tr>
				<tr>
					<td><strong>Fecha de nacimiento<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input id="fecha" onblur="validarFecha()" type="date" class="form-control" name="fecha_nacimiento_conductor"
						 required value="<?php $fecha_nacimiento ?>">
					</td>
				</tr>
				<tr>
					<td><strong>Seleccionar el tipo de licencia<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<select class="custom-select" name="tipo_licencia">
							<?php foreach ($licencia as $key) {?>
							<option  value="<?php echo $key['id_tipo']; ?>"><?php echo $key['tipo']; ?></option>
							<?php	} ?>
						</select>
					</td>
				</tr>
				<tr>
					<td><strong>Teléfono<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="number" required class="form-control" min="10000000" max="99999999" placeholder="Número de teléfono" name="telefono_conductor"
					 	 value="<?php $telefono ?>">
					</td>
				</tr>
				<tr>
					<td><strong>Seleccionar departamento<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<select class="custom-select" onchange="verificarDepto()" name="departamento" id="departamento">
							<option value="0">Seleccionar</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><strong>Seleccionar municipio<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<select class="custom-select" onchange="verificarMun()" name="municipio_conductor" id="municipio">
							<option value="0">Seleccionar</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><strong>Ingrese lugar de domicilio<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="text" class="form-control" onchange="verificarDepto()" placeholder="Domicilio" name="domicilio_conductor"
							required value="<?php $domicilio ?>">
					</td>
				</tr>
				</tr>
			</table>
			<td colspan="2">
				<input class="btn btn-primary btn-md"  disabled = "false" role="button" id="continuar" type="submit" required name="continuar" value="continuar">
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
//funcion Ajax para buscar en base de datos
$(function(){
	$.post('<?=$base_url?>/consecion/departamento').done(function(respuesta){
		$('#departamento').html(respuesta);
	});

	//lista de municipios
	$('#departamento').change(function(){
		var id_depto = $(this).val();

		$.post('<?=$base_url?>/consecion/municipio',{departamento: id_depto}).done(function(respuesta){
			$('#municipio').html(respuesta);
		});
	});
})

function validarFecha()
{
	var hoy = new Date();

	var resta = hoy.setFullYear(hoy.getFullYear()-10);//resta 10 años a la fecha de hoy
	var suma = hoy.setFullYear(hoy.getFullYear()-90);//le resta 90 años a la fcha de hoy

	let fecha_form_usuario = document.getElementById('fecha').value;
	let fecha_form = new Date(fecha_form_usuario);

// Comparamos solo las fechas => no las horas!!
hoy.setHours(0,0,0,0);  // Lo iniciamos a 00:00 horas

if (fecha_form <= suma) {
  alert('Fecha no valida, debe ingresar una fecha mayor a 1920');
	  document.getElementById("fecha").value = "";
	return 0;
}
if (fecha_form >= resta) {
  alert('Fecha no valida, debe ingresar una fecha de por lo menos 10 años atras');
	  document.getElementById("fecha").value = "";
}

else {

}
}
//validar No. de licencia
var ValidarLicencia = function() {
var licencia = $("#licencia").val();

var request = $.ajax({
	method: "POST",
	url: "<?=$base_url?>/conductor/validar",
	data: { licencia_conductor: licencia}
});

request.done(function(resultado) {
	if (resultado > 0) {
		alert('Numero de licencia existente!');
		$(function(){$("#licencia").val("");});
	}
});
}
//verifica si se ha seleccionado un departamento
var verificarDepto = function() {
var depto = $("#departamento").val();
var botonEnviar = document.getElementById('continuar');

if (depto == "0") {
	botonEnviar.disabled = true;
	}
}
//verifica si se ha seleccionado un municipio
var verificarMun = function() {
var mun = $("#municipio").val();
var botonEnviar = document.getElementById('continuar');

	if (mun != "0") {
		botonEnviar.disabled = false; //activa el boton continuar
	}
	if (mun == "0") {
		botonEnviar.disabled = true; //desactiva el boton continuar
	}
}
</script>
</html>
