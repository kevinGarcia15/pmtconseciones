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
						<input  type="number" class="form-control"
							placeholder="CUI" name="CUI_ayudante" min="999999999999" required
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
						<select class="custom-select" name="aldea_id_aldea_ayudante" id="aldea">
							<option value="0">Seleccionar</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><strong>Ingrese lugar de domicilio</strong></td>
					<td>
						<input type="text" class="form-control" placeholder="Domicilio" name="domicilio_ayudante"
						 value="<?php $domicilio_ayudante;?>">
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

</script>
</html>
