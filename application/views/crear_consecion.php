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
		<h1><img width="70" src="<?=$base_url?>/recursos/img/logo.png"/> Ingreso de concesión</h1>
	</header>

	<div  id="body">
		<form  id="subir" action="<?=$base_url?>/consecion/crear/" method="POST">
			<h1>Ingreso de datos de la concesión</h1>
			<table class="table table-bordered" border="1">
				<tr>
					<td><strong>Ingrese código de la concesión<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<div class="row">
							<div class="col-4">
								<input type="number" onchange="ValidarNumero()" id="numero" class="form-control" placeholder="número" name="numero_consecion" min="1" required value="<?=$numero_consecion?>">
							</div>
							<div class="col-2 alert alert-info">
								Abreviatura: <?php echo $abreviatura; ?>
							</div>
							<div class="col-4">
								<input type="hidden"  id="abr" class="form-control"  placeholder="<?php echo $abreviatura; ?>" name="clave" min="1"  value="<?php echo $abreviatura; ?>">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td><strong>Seleccionar la ruta que cubre<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<div class="row">
							<div class="col-8">
								<select class="custom-select" name="ruta_id_ruta">
									<?php foreach ($ruta as $key) {?>
									<option value="<?php echo $key['id_ruta']; ?>"><?php echo $key['nombre']; ?></option>
									<?php	} ?>
								</select>
							</div>
							<div class="col-2">
								Ingresar ruta nueva
							</div>
							<div class="col-2">
								<!-- Boton que activa la ventana emergente-->
								<img type="button" data-toggle="modal" data-target="#IngresoRuta" data-whatever="@mdo" src="<?=$base_url?>/recursos/img/plus.png" style="width: 24px;" alt="">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td><strong>Ingrese su lugar de parqueo<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<input type="text" class="form-control" placeholder="Lugar" name="parqueo"
							required maxlength="50" size="50"  value="<?php $parqueo; ?>">
					</td>
				</tr>

				<tr>
					<td><strong>Ingrese la tarifa<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<div class="row">
							<div class="col-8">
								<input type="number" step="any" min="0"class="form-control" placeholder="Tarifa báse" required name="tarifa"  value="<?php $tarifa ?>">
							</div>
							<div class="col-4">
								Quetzales
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td><strong>Ingrese horarios<strong style="color: red; font-size: 20px">*</strong></strong></td>
					<td>
						<div class="row">
							<div class="col-2">
								horario de inicio
							</div>
							<div class="col-2">
								<input type="time" min="00:00:00" max="11:59:59" class="form-control"  name="horario_inicio"  required value="<?=$horario_inicio?>">
							</div>
							<div class="col-2">
								horario Fin
							</div>
							<div class="col-2">
								<input type="time" min="12:00:00" max="23:59:59" class="form-control"  name="horario_fin" required value="<?=$horario_fin?>">
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<td><strong>Observaciones</strong></td>
					<td>
						<textarea class="form-control" id="message-text" name="descripcion" value="<?php $descripcion ?>"></textarea>
					</td>
				</tr>
				</tr>
			</table>
			<td colspan="2">
				<input class="btn btn-primary btn-md" type="submit" role="button"  name="finalizar" value="Finalizar">
				<input class="btn btn-danger btn-md"  role="button" onclick="mensaje()"  name="cancelar" value="Cancelar">
			</td>
		</form>
		<!-- inicio del formulario emergente-->
		<div class="modal fade" id="IngresoRuta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel" style="color:white;">Crear Ruta</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="subir" action="<?=$base_url?>/consecion/crearRuta/" method="POST">
							<div class="form-group">
								<label for="recipient-name" class="col-form-label" style="color:white;">Ingrese nombre de la ruta</label>
								<input type="text" required class="form-control" id="recipient-name" name="ruta" value="<?php $rut ?>">
							</div>
							<div class="form-group">
								<label for="message-text" class="col-form-label" style="color:white;">ingrese una descripción</label>
								<textarea class="form-control" id="message-text" name="descripcion" value="<?php $descripcion ?>"></textarea>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal" style="color:white;">Cerrar</button>
								<button  type="submit" class="btn btn-primary" name="guardar" value="Guardar" style="color:white;">Guardar</button>
								<?php $ruta ?>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- Fin ventana emergente-->
		<?php $mensaje ?>
		<div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
	</div>

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
//validar No. de concesion
var ValidarNumero = function() {
var numero_conce = $("#numero").val();
var abrev = $("#abr").val();
var numero = numero_conce + abrev;
var request = $.ajax({
	method: "POST",
	url: "<?=$base_url?>/consecion/validar",
	data: { numero_consecion: numero}
});

request.done(function(resultado) {
	if (resultado > 0) {
		alert('Numero de concesión existente!');
		$(function(){$("#numero").val("");});
	}
});
}
</script>
</html>
