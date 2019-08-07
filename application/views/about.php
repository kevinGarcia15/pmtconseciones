<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<?php $this->load->view('header'); ?>
	<title>Acerca de esta aplicación</title>
</head>
<body>

<div id="container">
	<?php $this->load->view('menu'); ?>
	<header>
		<h1><img width="70" src="<?=$base_url?>/recursos/img/hospital.jpg"/> Acerca de...</h1>
	</header>

	<div id="body">
		<div class="bs-callout bs-callout-info">
			<div style="float: left;">
				<img src="<?=$base_url?>/recursos/img/umglogo.png" width="120" style="margin-right: 20px"/>
			</div>
			<h4 id="callout-progress-csp">Desarrollo Web</h4>
			<p>
				Facultad de Ingeniería en Sistemas, Universidad Mariano Gálvez.
			</p>
			<p>
				Totonicapán, <?=date("Y")?>.
			</p>
			<p>
				2019
			</p>
		</div>
	</div>

	<footer><?php $this->load->view('footer') ?></footer>
</div>

</body>
</html>
