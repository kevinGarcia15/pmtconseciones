<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";
?><!DOCTYPE html>

	<div  id="body">
		<h1>Ingreso de datos de la ruta</h1>
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Crear ruta</button>
			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h5 class="modal-title" id="exampleModalLabel">Crear Ruta</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			          <span aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <div class="modal-body">
			        <form id="subir" action="<?=$base_url?>/consecion/crearRuta/" method="POST">
			          <div class="form-group">
			            <label for="recipient-name" class="col-form-label">Ingrese nombre de la ruta</label>
			            <input type="text" class="form-control" id="recipient-name" name="ruta" value="<?php $rut ?>">
			          </div>
			          <div class="form-group">
			            <label for="message-text" class="col-form-label">ingrese una descripción</label>
			            <textarea class="form-control" id="message-text" name="descripcion" value="<?php $descripcion ?>"></textarea>
			          </div>
								<div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
					        <button  type="submit" class="btn btn-primary" name="guardar" value="Guardar">Guardar</button>
									<?php $ruta ?>
					      </div>
			        </form>
			      </div>
			    </div>
			  </div>
			</div>
		<?php $mensaje ?>
		<div class="label label-danger label-md" onclick="$(this).hide(1000)"><?=$mensaje?></div>
	</div>
<script type="text/javascript">
function enviar(){
  document.getElementById("subir").submit();
}
</script>
</html>
