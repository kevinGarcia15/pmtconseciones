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
		<h1><img width="70" src="<?=$base_url?>/recursos/img/logo.png"/> Ingreso de conseción</h1>
	</header>

	<div  id="body">
		<form  id="subir" action="<?=$base_url?>/consecion/crear/" method="POST">
			<h1>Ingreso de datos del contratista</h1>
			<table border="1">
				<tr>
					<td><strong>Ingrese No. de documento DPI<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="number" class="form-control" placeholder="CUI" name="CUI_contratista" min="999999999999" required value="<?=$CUI_contratista?>">
					</td>
				</tr>
				<tr>
					<td><strong>Nombre<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="text" class="form-control" placeholder="Nombre" name="nombre_contratista" required maxlength="50" size="50" value="<?=$nombre_contratista?>">
					</td>
				</tr>
				<tr>
					<td><strong>Apellido<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="text" class="form-control" placeholder="Apellido" name="Apellido_contratista" required maxlength="50" size="50" value="<?=$apellido_contratista?>">
					</td>
				</tr>
				<tr>
					<td><strong>Fecha de nacimiento<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input id="fecha" onchange="validarFecha()" type="date" class="form-control" name="fecha_nacimiento_contratista" required value="<?=$fecha_nacimiento_contratista?>">
					</td>
				</tr>
				<tr>
					<td><strong>Teléfono</strong></td>
					<td>
						<input type="number" class="form-control" min="1" placeholder="Número de teléfono" name="telefono_contratista" required value="<?=$telefono_contratista?>">
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
						<select class="custom-select" name="municipio" id="Aldea">
							<option value="0">Seleccionar</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><strong>Ingrese lugar de domicilio</strong></td>
					<td>
						<input type="text" class="form-control" placeholder="Domicilio" name="domicilio_contratista" required value="<?=$domicilio_contratista?>">
					</td>
				</tr>
				</tr>
			</table>
			<hr>
			<hr>

			<!-- Formulario para el ingreso del conductor asociado a la consecion-->
			<h1>Ingreso de datos del Conductor</h1>
			<table border="1">
				<tr>
					<td><strong>Ingrese No. de licencia<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="number" class="form-control" placeholder="Número" min="999999999999" name="$numero_licencia" required value="<?=$numero_licencia?>">
					</td>
				</tr>
				<tr>
					<td><strong>Seleccione tipo de licencia</strong></td>
					<td>
						<select class="custom-select" name="tipo_licencia">
							<option value="0">Seleccionar</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><strong>Nombre<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="text" class="form-control" placeholder="Nombre" name="nombre_piloto" required maxlength="50" size="50" value="<?=$nombre_piloto?>">
					</td>
				</tr>
				<tr>
					<td><strong>Apellido<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="text" class="form-control" placeholder="Apellido" name="Apellido_piloto" required maxlength="50" size="50" value="<?=$apellido_piloto?>">
					</td>
				</tr>
				<tr>
					<td><strong>Fecha de nacimiento<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input id="fecha2" onchange="validarFecha()" type="date" class="form-control" name="fecha_nacimiento_piloto" required value="<?=$fecha_nacimiento_piloto?>">
					</td>
				</tr>
				<tr>
					<td><strong>Teléfono</strong></td>
					<td>
						<input type="number" class="form-control" min="10000000" max="99999999" placeholder="Número de teléfono" name="telefono_piloto" required value="<?=$telefono_piloto?>">
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
						<select class="custom-select" name="municipio" id="municipio">
							<option value="0">Seleccionar</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><strong>Ingrese lugar de domicilio</strong></td>
					<td>
						<input type="text" class="form-control" placeholder="Domicilio" name="domicilio_piloto" required value="<?=$domicilio_piloto?>">
					</td>
				</tr>
				</tr>
			</table>
			<hr>
			<hr>

			<!-- Formulario para el ingreso de los datos del vehiculo-->
			<h1>Ingreso de datos del vehiculo</h1>
			<table border="1">
				<tr>
					<td><strong>Ingrese No. de placas<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="text" class="form-control" placeholder="Placas"  name="$numero_placa" required value="<?=$numero_placa?>">
					</td>
				</tr>
				<tr>
					<td><strong>Seleccione el modelo</strong></td>
					<td>
						<select class="custom-select" name="tipo_licencia">
							<?php
							$año_inicio  = '1950';
							$años_actual = date("Y");
							while ($año_inicio < $años_actual) { $año_inicio = $año_inicio + 1; ?>
								<option value=""><?php echo "$año_inicio"; ?></option>
							<?php } ?>
						</select>
					</td>
				</tr>
				<tr>
					<td><strong>Nombre<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="text" class="form-control" placeholder="Nombre" name="nombre_piloto" required maxlength="50" size="50" value="<?=$nombre_piloto?>">
					</td>
				</tr>
				<tr>
					<td><strong>Apellido<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="text" class="form-control" placeholder="Apellido" name="Apellido_piloto" required maxlength="50" size="50" value="<?=$apellido_piloto?>">
					</td>
				</tr>
				<tr>
					<td><strong>Fecha de nacimiento<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input id="fecha2" onchange="validarFecha()" type="Year" class="form-control" name="fecha_nacimiento_piloto" required value="<?=$fecha_nacimiento_piloto?>">
					</td>
				</tr>
				<tr>
					<td><strong>Teléfono</strong></td>
					<td>
						<input type="number" class="form-control" min="10000000" max="99999999" placeholder="Número de teléfono" name="telefono_piloto" required value="<?=$telefono_piloto?>">
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
						<select class="custom-select" name="municipio" id="municipio">
							<option value="0">Seleccionar</option>
						</select>
					</td>
				</tr>
				<tr>
					<td><strong>Ingrese lugar de domicilio</strong></td>
					<td>
						<input type="text" class="form-control" placeholder="Domicilio" name="domicilio_piloto" required value="<?=$domicilio_piloto?>">
					</td>
				</tr>
				</tr>
			</table>
			<td colspan="2">
				<input class="btn btn-primary btn-md" type="submit" role="button" name="guardar" value="Guardar">
			</td>
		</form>
		<?php $mensaje ?>
		<div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
	</div>

	<footer><?php $this->load->view('footer') ?></footer>
</div>

</body>


<script type="text/javascript">
//funcion Ajax para buscar en base de datos
$(function(){
	$.post('<?=$base_url?>/corredor/pais').done(function(respuesta){
		$('#pais').html(respuesta);
	});

	//lista de departamentos
	$('#pais').change(function(){
		var el_pais = $(this).val();

		$.post('<?=$base_url?>/corredor/departamento',{pais: el_pais}).done(function(respuesta){
			$('#departamento').html(respuesta);
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
</script>
</html>
