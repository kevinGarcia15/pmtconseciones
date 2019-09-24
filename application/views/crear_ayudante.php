<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
?><!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<title>Ingresar Ayudante</title>
</head>
<body>

<div id="container">
	<?php $this->load->view('menu'); ?>
	<header>
		<h1><img width="70" src="<?=$base_url?>/recursos/img/logo.png"/> Ingreso de datos del ayudante</h1>
	</header>

	<div  id="body">
		<form  id="subir" action="<?=$base_url?>/ayudante/crearAyudante" method="POST">
			<table class="table table-bordered" border="1">
				<tr>
					<td><strong>Ingrese No. de documento DPI<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input  id="cui" onchange="ValidarCui()" type="number" class="form-control"
							placeholder="CUI" name="CUI_ayudante" min="1000000000000" max="9999999999999" required
							value="<?php $CUI_ayudante;?>">
					</td>
				</tr>
				<tr>
					<td><strong>Nombre<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="text" class="form-control" placeholder="Nombre" name="nombre_ayudante"
							required maxlength="50" size="50"  value="<?php $nombre_ayudante; ?>">
					</td>
				</tr>
				<tr>
					<td><strong>Apellido<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="text" class="form-control" placeholder="Apellido" name="apellido_ayudante"
							required maxlength="50" size="50"  value="<?php $apellido_ayudante;?>">
					</td>
				</tr>
				<tr>
					<td><strong>Fecha de nacimiento<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input id="fecha" onchange="validarFecha()" type="date" class="form-control" name="fecha_nacimiento_ayudante"
							 required value="<?php $fecha_nacimiento_ayudante; ?>">
					</td>
				</tr>
				<tr>
					<tr>
						<td><strong>Seleccionar departamento</strong></td>
						<td>
							<select class="custom-select" onchange="verificarDepto()" name="departamento" id="departamento">
								<option value="0">Seleccionar</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><strong>Seleccionar municipio</strong></td>
						<td>
							<select class="custom-select" onchange="verificarMun()" name="municipio" id="municipio">
								<option value="0">Seleccionar</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><strong>Números de teléfono</strong></td>
						<td>
							<input type="number" class="form-control" min="10000000" max="99999999" placeholder="Número de teléfono" name="telefono_ayudante"
						 	value="<?php $telefono_ayudante;?>">
						</td>
					</tr>
				<tr>
					<td><strong>Ingrese lugar de domicilio</strong></td>
					<td>
						<input type="text" class="form-control" required placeholder="Domicilio" name="domicilio_ayudante"
						 value="<?php $domicilio_ayudante;?>">
					</td>
				</tr>
				</tr>
			</table>
			<td colspan="2">
				<input class="btn btn-primary btn-md"  role="button" disabled = "false" type="submit" id="continuar" required name="continuar" value="continuar">
				<input class="btn btn-warning btn-md"  role="button"  type="reset" required name="Reset" value="Reset">
				<input class="btn btn-danger btn-md"  role="button" onclick="mensaje()"  name="omitir" value="omitir">
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
function mensaje(){
	// confirm dialog
alertify.confirm("¿Está seguro de omitir?", function (e) {
		if (e) {
			document.getElementById("subir").submit(); //Sube el documento
		}else{
		}
	});
}

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
	let fecha_form_usuario = document.getElementById('fecha').value;
	let fecha_form = new Date(fecha_form_usuario);

// Comparamos solo las fechas => no las horas!!
hoy.setHours(0,0,0,0);  // Lo iniciamos a 00:00 horas

if (fecha_form >= hoy) {
  alert('Fecha no valida');
	  document.getElementById("fecha").value = "";
	}
}
//validar No. de CUI
var ValidarCui = function() {
var cui = $("#cui").val();

var request = $.ajax({
	method: "POST",
	url: "<?=$base_url?>/ayudante/validar",
	data: {cui_ayudante: cui}
});

request.done(function(resultado) {
	if (resultado == 's1') {
		alert('Numero de cui existente!');
		$(function(){$("#cui").val("");});
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
