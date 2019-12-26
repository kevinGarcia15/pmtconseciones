<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style media="screen">

}
<?php
if (isset($this->session->USUARIO)) { // Sesión iniciada
  $log = "<a class=\"nav-item nav-link active \" style=\"color: white;\" href=\"${base_url}/usuario/logout\">SALIR</a>";
} else {
  $log = "<a class=\"nav-item nav-link active \"style=\"color: white;\" href=\"${base_url}/usuario/login\">ENTRAR</a>";
}
 ?>
</style>

<nav class="navbar navbar-dark bg-dark navbar-expand-sm" >
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="<?=$base_url?>/inicio">
    <img src="<?=$base_url?>/recursos/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="Logo">
    PMT Totonicapán
  </a>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    <div class="navbar-nav">
        <a class="nav-item nav-link active" href="<?=$base_url?>/inicio">Inicio</a>
        <?php if ($this->session->ROL == 'Administrador') { ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Usuario
           </a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
             <a class="dropdown-item" href="<?=$base_url?>/usuario/crear">Ingresar Nuevo Usuario</a>
             <a class="dropdown-item" href="<?=$base_url?>/usuario/activos">Listar Usuarios Activos</a>
           </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Conseción
           </a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="<?=$base_url?>/contratista/crearContratista">Crear Concesión</a>
            <a class="dropdown-item" href="<?=$base_url?>/informes/listar">Listar Concesión</a>
            <a class="dropdown-item" href="<?=$base_url?>/informes/informes">Informes</a>
           </div>
          </li>
          <a class="nav-item nav-link" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Buscar</a>
          <a class="nav-item nav-link" href="http://localhost:8080/pentaho/Home">graficas</a>
          <?php } ?>

  <!--Restricciones para usuario-->
        <?php if ($this->session->ROL == 'Usuario') { ?>
          <a class="nav-item nav-link" href="<?=$base_url?>/informes/listar">Listar conseciones</a>
          <a class="nav-item nav-link" href="<?=$base_url?>/informes/informes">Informes</a>
          <a class="nav-item nav-link" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Buscar</a>

        <?php } ?>
<!--fin de restricciones-->
        <!-- inicio del formulario emergente-->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel" style="color:white;">Buscar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form id="buscar" action="<?=$base_url?>/informes/buscar/" method="POST">
                  <div class="form-group">
                    <label for="recipient-name" class="col-form-label" style="color:white;">Seleccione el criterio de busqueda</label>
                    <select  class="form-control" name="criterio">
                			<option value="numero">Número concesión</option>
                			<option value="v.numero_placa">Número de placa</option>
                			<option value="pil.nombre">Nombre del piloto</option>
                		</select>
                  </div>
                  <div class="form-group">
                    <label for="message-text" class="col-form-label" style="color:white;">Ingrese el valor a buscar</label>
                    <input class="form-control mr-sm-2" name="busqueda" type="search" placeholder="Search..." aria-label="Search">
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="color:white;">Cerrar</button>
                    <button  type="submit" class="btn btn-primary" name="buscar" value="buscar" style="color:white;">buscar</button>
                    <?php $ruta ?>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Fin ventana emergente-->
      </div>
    </div>
    <?=$log?>
</nav>
