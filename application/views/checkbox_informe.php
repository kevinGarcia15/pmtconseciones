<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<title>Informes</title>
</head>
<body>
<div id="container">
	<?php $this->load->view('menu'); ?>
	<header>
		<h1><img width="70" src="<?=$base_url?>/recursos/img/logo.png"/>Informes</h1>
	</header>

	<div id="body">
		<form  id="subir" action="<?=$base_url?>/informes/informe_categoria" method="POST">
		<!--select del tipo de vehiculo a seleccionar-->
		<div class="col-sm-4">
			<tr>
				<h5>Seleccione el tipo de vehículo para realizar la busqueda</h5>
				<td>
					<select class="custom-select" name="tipo_vehiculo">
						<?php foreach ($tipo as $key) {?>
						<option value="<?php echo $key['tipo_vehiculo']; ?>"><?php echo $key['tipo_vehiculo']; ?></option>
						<?php	} ?>
					</select>
				</td>
			</tr>
			<br><br>
		</div>
		<?php echo $mensaje; ?>
<!--inicio de los checkbox de la concesion-->
			<h4>Seleccione los titulo que desea mostrar en el informe</h4>
			<br><br>

			<h5 style="text-align:center">Información de la concesión</h5>
			<hr>
			<div class="form-group row">
				<?php
				$titulo_conce = ['Codigo_concesion','Tarifa','Horario_inicio', 'Horario_fin', 'Ruta','Lugar_parqueo'];//arreglo que contiene los titulo a seleccionar
				$campos_conce = ['c.numero Codigo_concesion','c.tarifa Tarifa',' c.hora_inicio Horario_inicio', 'c.hora_fin Horario_fin', 'r.nombre Ruta',' c.parqueo Lugar_parqueo'];

				$cont = 0;
					foreach ($campos_conce as $key) {?>
					<div class="col-sm-4">
						<div class="form-check">
							<label class="form-check-label" >
									<input class="form-check-input" id="check<?php echo $cont ?>" type="checkbox" onclick="agregar(<?php echo $cont; ?> ,'<?php echo $titulo_conce[$cont]; ?>');"
												 name="valor[]" value="<?php echo $key; ?>"><?php echo $titulo_conce[$cont]; ?>
							</label>
							<input type="hidden" id="titulo<?php echo $cont; ?>" name="titulo[]" value="">
						</div>
					</div>
				<?php	$cont= $cont + 1;} ?>
			</div>
<!--fin de los checkbox de la concesion-->

	<br>
	<h5 style="text-align:center">Información del contratista</h5>
	<hr>
	<div class="form-group row">
		<?php
		$titulo_contra = ['DPI_contratista','Nombre_contratista', 'Apellido_contratista', 'Telefono_Contra', 'Domicilio_Contra', 'Canton_Aldea_contra'];//arreglo que contiene los titulo a seleccionar
		$campo_contra = ['con.cui DPI_contratista','contra.nombre Nombre_contratista', 'contra.apellido	Apellido_contratista',
							'con.telefono Telefono_Contra','con.domicilio Domicilio_Contra','cant_contra.nombre Canton_Aldea_contra'];
		$cont_contra = 0;
			foreach ($campo_contra as $key) {?>
			<div class="col-sm-4">
				<div class="form-check">
					<label class="form-check-label" >
							<input class="form-check-input" id="check<?php echo $cont_contra + 7 ?>" type="checkbox"
										 onclick="agregar(<?php echo $cont_contra + 7; ?> ,'<?php echo $titulo_contra[$cont_contra]; ?>');"
										 name="valor[]" value="<?php echo $key; ?>"><?php echo $titulo_contra[$cont_contra]; ?>
					</label>
					<input type="hidden" id="titulo<?php echo $cont_contra + 7; ?>" name="titulo[]" value="">
				</div>
			</div>
		<?php	$cont_contra= $cont_contra + 1;} ?>
	</div>
<!--fin de los checkbox del contratista-->

<br>
<h5 style="text-align:center">Información del piloto</h5>
<hr>
<div class="form-group row">
	<?php
	$titulo_pil = ['Numero_licencia_piloto','Nombre_piloto', 'Apellido_piloto', 'Tipo_licencia_piloto','Telefono_piloto', 'Domicilio_piloto', 'Municipio_piloto'];//arreglo que contiene los titulo a seleccionar

	$campo_pil = ['p.numero_licencia Numero_licencia_piloto',
								'pil.nombre Nombre_piloto',
								'pil.apellido	Apellido_piloto',
								'lice.tipo Tipo_licencia_piloto',
								'p.telefono Telefono_piloto',
								'p.domicilio Domicilio_piloto',
								'mun_pil.nombre_mun Municipio_piloto'];
	$cont_pil = 0;
	foreach ($campo_pil as $key) {?>
		<div class="col-sm-4">
			<div class="form-check">
				<label class="form-check-label" >
						<input class="form-check-input" id="check<?php echo $cont_pil + 13 ?>" type="checkbox"
									 onclick="agregar(<?php echo $cont_pil + 13; ?> ,'<?php echo $titulo_pil[$cont_pil]; ?>');"
									 name="valor[]" value="<?php echo $key; ?>"><?php echo $titulo_pil[$cont_pil]; ?>
				</label>
				<input type="hidden" id="titulo<?php echo $cont_pil + 13; ?>" name="titulo[]" value="">
			</div>
		</div>
	<?php	$cont_pil= $cont_pil + 1;} ?>
	</div>
<!--fin de los checkbox de la piloto-->
<br>
<h5 style="text-align:center">Información del vehículo</h5>
<hr>
<div class="form-group row">
	<?php
	$titulo_veh = ['Numero_placa','Numero_tarjeta_circulación', 'Modelo_vehiculo', 'Color_vehiculo', 'Tipo_vehiculo', 'Marca_vehiculo'];//arreglo que contiene los titulo a seleccionar

	$campo_veh = ['v.numero_placa Numero_placa',
								'v.tarjeta_circulacion Numero_tarjeta_circulación',
								'v.modelo Modelo_vehiculo',
								'col.color Color_vehiculo',
								't.tipo_vehiculo Tipo_vehiculo',
								'm.nombre Marca_vehiculo'];
	$cont_veh = 0; //para recorrer el vector $titulo_veh

		foreach ($campo_veh as $key) {?>
		<div class="col-sm-4">
			<div class="form-check">
				<label class="form-check-label" >
						<input class="form-check-input" id="check<?php echo $cont_veh + 20 ?>" type="checkbox"
									 onclick="agregar(<?php echo $cont_veh + 20; ?> ,'<?php echo $titulo_veh[$cont_veh]; ?>');"
									 name="valor[]" value="<?php echo $key; ?>"><?php echo $titulo_veh[$cont_veh]; ?>
				</label>
				<input type="hidden" id="titulo<?php echo $cont_veh + 20; ?>" name="titulo[]" value="">
			</div>
		</div>
	<?php	$cont_veh= $cont_veh + 1;} ?>
	</div>
<!--fin de los checkbox del vehículo-->
	</div>
	<input class="btn btn-primary btn-md" role="button" id="continuar" type="submit" name="continuar" value="Continuar">
	</form>
		<br><br><br>
		<footer><?php $this->load->view('footer') ?></footer>
	</div>
</div>
<script type="text/javascript">
	function consultaCategoría(){
		document.getElementById("selectCategoria").submit();
	}

	function agregar(cont,titulo){
		var check = $('#check'+cont+':checked').val();
		if (check) {
			$("#titulo"+cont).val(titulo);
		}else {
			$("#titulo"+cont).val("");
		}
	}

	$(document).click(function() { //Creamos la Funcion del Click
	  	var checked = $(".form-check-input:checked").length; //Creamos una Variable y Obtenemos el Numero de Checkbox que esten Seleccionados
			if (checked >= 7) {
				var botonEnviar = document.getElementById('continuar');
				alert("Numero de botones exedidos, debe seleccionar menos de 7 botones");
			}
 	})
 </script>
</body>
</html>
