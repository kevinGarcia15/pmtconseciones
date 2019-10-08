<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<?php
if (isset($this->session->USUARIO)) { // Sesión iniciada
  $log = "<a class=\"btn btn-outline-success btn-lg \" role=\"button\" href=\"${base_url}/usuario/logout\">SALIR</a>";
} else {
  $log = "<a class=\"btn btn-outline-success btn-lg \"role=\"button;\" href=\"${base_url}/usuario/login\">INGRESAR</a>";
}
 ?>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<title>Bienvenido <?php echo $this->session->USUARIO; ?></title>
</head>
<body>
<div id="container">
	<?php $this->load->view('menu'); ?>
	<br>
	<div class="container-flu bg-primary"></div>
	<br><br>
	<div>
	  <h3><center>Policía Municipal de Transito de Totonicapán</center></h2>
	  <h3><center><?php $año = date("Y"); echo $año; ?></center></h2><br>
	</div>
	<div class="container-flu bg-info"></div>
<br><br>
<div><center>
	<img src="<?=$base_url?>/recursos/img/logo.png" style="width:100px">
	<img src="<?=$base_url?>/recursos/img/muni.png" style="width:100px">

</center></div>
<br>
<section id="info2">
        <div class="container">
  <!--        <?php print_r($this->session->userdata()); ?>-->
            <div class="info text-center">
              <br>
                <h1 class="h4">BIENVENIDOS</h1>
                <p class="lead">Sistema de control de concesiones</p>
                <hr class="m-y-2">
                <p class="lead">
									<?php echo $log; ?>
                </p>
              </div>
              <br>
        </div>
    </section>
		<?php  if (isset($this->session->USUARIO)) {?>
		<section>
			 <div class="card-group text-center">
        <?php if ($this->session->ROL == 'Administrador') { ?>
								<div class="col-md-12 col-lg-3">
										<div class="card m-3">
												<img class="card-img-top mb-3"  style="width:70%;padding-left: 0px;margin-left: 56px;" src="<?=$base_url?>/recursos/img/creacion.png" alt="Card image cap">
												<div class="card-block">
													 <h4 class="card-title">Usuario</h4>
														<p class="card-text p-2">Crear usuario</p>
														<!-- Large modal -->
													 <a class="btn btn-warning" href="<?=$base_url?>/usuario/crear" role="button" >Visitar</a>
												</div>
												<br>
										</div>
								</div>
								<div class="col-md-12 col-lg-3">
										<div class="card m-3">
												<img class="card-img-top mb-3" style="width:70%;padding-left: 0px;margin-left: 56px;" src="<?=$base_url?>/recursos/img/listarUsuario.jpg" alt="Card image cap">
												<div class="card-block">
													 <h4 class="card-title">Ver</h4>
														<p class="card-text p-2">Listar Usuarios activos</p>
														<!-- Large modal -->
													 <a class="btn btn-warning" href="<?=$base_url?>/usuario/activos" role="button">Visitar</a>
												</div>
												<br>
										</div>
								</div>
								<div class="col-md-12 col-lg-3">
										<div class="card m-3">
												<img class="card-img-top mb-3" style="width:70%;padding-left: 0px;margin-left: 56px;" src="<?=$base_url?>/recursos/img/consecion.png" alt="Card image cap" >
												<div class="card-block">
														<h4 class="card-title">Concesión</h4>
														<p class="card-text p-2">Crear Concesión</p>
														<!-- Large modal -->
													 <a class="btn btn-warning" href="<?=$base_url?>/contratista/crearContratista" role="button">Visitar</a>
												</div>
												<br>
										</div>
								</div>
								<div class="col-md-12 col-lg-3">
										<div class="card m-3">
												<img class="card-img-top mb-3" style="width:70%;padding-left: 0px;margin-left: 56px;" src="<?=$base_url?>/recursos/img/listarConsecion.jpg" alt="Card image cap" >
												<div class="card-block">
														<h4 class="card-title">Ver</h4>
														<p class="card-text p-2">Listar Concesiones</p>
														<!-- Large modal -->
													 <a class="btn btn-warning" href="<?=$base_url?>/informes/listar" role="button">Visitar</a>
												</div>
												<br>
										</div>
								</div>
              <?php } ?>
<!--fin de lo que se le muestra al Administrador-->
        <?php if ($this->session->ROL == 'Usuario') { ?>
          <?php $this->load->view('inicio_usuario'); ?>
          <?php } ?>
						</div>
 				</section>
				<?php }?>
	<footer><?php $this->load->view('footer') ?></footer>
</div>

</body>
</html>
