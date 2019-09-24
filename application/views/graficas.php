<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$mensaje = isset($mensaje) ? $mensaje : "";

?><!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<title>Gráficas</title>
</head>
		<body>

		<div id="container">
			<?php $this->load->view('menu'); ?>
			<header>
				<h1><img width="70" src="<?=$base_url?>/recursos/img/cor.png"/>Gráficas</h1>
			</header>
			<div  id="body">
				<div class="container">
				  <div class="row justify-content-md-center">
						<h1 style="text-align: center;">Corredores por categoría</h1>
				    <div  class="col-md-auto">
							<div id="grafica"class="">
								<iframe width="800" height="600" src="https://app.powerbi.com/view?r=eyJrIjoiNjk5NThmY2MtYThlMS00YzRmLWFlZWItZmQzNDVmNjZhYmEzIiwidCI6Ijg4Mjc4MzNhLWQ3MmItNGUwMS1hY2ZkLWJlNzFjNzdhMzFhYSJ9" frameborder="0" allowFullScreen="true"></iframe>
							</div>
							<div id="grafica"class="">
							<iframe width="800" height="600" src="https://app.powerbi.com/view?r=eyJrIjoiNTZjZWQ4ZDMtYWJmOS00YTNiLWI1ZWMtYzc1NjgxZThlZWY0IiwidCI6Ijg4Mjc4MzNhLWQ3MmItNGUwMS1hY2ZkLWJlNzFjNzdhMzFhYSJ9" frameborder="0" allowFullScreen="true"></iframe>
							</div>
				    </div>
				</div>
			</div>
			</div>
			<footer><?php $this->load->view('footer') ?></footer>
		</div>
	</body>
	<script type="text/javascript">
	</script>
</html>
