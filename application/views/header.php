<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<link rel="stylesheet" type="text/css" href="<?=$base_url?>/recursos/css/bootstrap.min.css" />
	<script type="text/javascript" src="<?=$base_url?>/recursos/js/jquery-3.3.1.slim.min.js"></script>
	<script type="text/javascript" src="<?=$base_url?>/recursos/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?=$base_url?>/recursos/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?=$base_url?>/recursos/js/popper.min.js"></script>
	<script type="text/javascript" src="<?=$base_url?>/recursos/js/edicion-plan.js"></script>
	<script type="text/javascript" src="<?=$base_url?>/recursos/js/jquery-3.4.1.min.js"></script>
	<script src="<?=$base_url?>/recursos/js/alertify.js-0.3.11/lib/alertify.min.js"></script>
	<script src="<?=$base_url?>/recursos/js/plotly-latest.min.js"></script>
	<link rel="stylesheet" href="<?=$base_url?>/recursos/js/alertify.js-0.3.11/themes/alertify.core.css" />
	<link rel="stylesheet" href="<?=$base_url?>/recursos/js/alertify.js-0.3.11/themes/alertify.default.css" />


	<!--link rel="icon" href="<?=$base_url?>/favicon.ico"-->

	<style type="text/css">
	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #040455;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	th, td { padding: 5px; }

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: -38px;
		border: 0px solid #D0D0D0;
		box-shadow: 0 0 0px #D0D0D0;
	}

	.bs-callout {
	    padding: 20px;
	    margin: 20px 0;
	    border: 1px solid #eee;
	    border-left-width: 5px;
	    border-radius: 3px;
	}
	.bs-callout h4 {
	    margin-top: 0;
	    margin-bottom: 5px;
	}
	.bs-callout p:last-child {
	    margin-bottom: 0;
	}
	.bs-callout code {
	    border-radius: 3px;
	}
	.bs-callout+.bs-callout {
	    margin-top: -5px;
	}
	.bs-callout-default {
	    border-left-color: #777;
	}
	.bs-callout-default h4 {
	    color: #777;
	}
	.bs-callout-primary {
	    border-left-color: #428bca;
	}
	.bs-callout-primary h4 {
	    color: #428bca;
	}
	.bs-callout-success {
	    border-left-color: #5cb85c;
	}
	.bs-callout-success h4 {
	    color: #5cb85c;
	}
	.bs-callout-danger {
	    border-left-color: #d9534f;
	}
	.bs-callout-danger h4 {
	    color: #d9534f;
	}
	.bs-callout-warning {
	    border-left-color: #f0ad4e;
	}
	.bs-callout-warning h4 {
	    color: #f0ad4e;
	}
	.bs-callout-info {
	    border-left-color: #5bc0de;
	}
	.bs-callout-info h4 {
	    color: #5bc0de;
	}
	/* Footer */

	section {
	    padding: 60px 0;
	}

	section .section-title {
	    text-align: center;
	    color: #007b5e;
	    margin-bottom: 50px;
	    text-transform: uppercase;
	}
	#footer {
	    background: #007b5e !important;
	}
	#footer h5{
		padding-left: 10px;
	    border-left: 3px solid #eeeeee;
	    padding-bottom: 6px;
	    margin-bottom: 20px;
	    color:#ffffff;
	}
	#footer a {
	    color: #ffffff;
	    text-decoration: none !important;
	    background-color: transparent;
	    -webkit-text-decoration-skip: objects;
	}
	#footer ul.social li{
		padding: 3px 0;
	}
	#footer ul.social li a i {
	    margin-right: 5px;
		font-size:25px;
		-webkit-transition: .5s all ease;
		-moz-transition: .5s all ease;
		transition: .5s all ease;
	}
	#footer ul.social li:hover a i {
		font-size:30px;
		margin-top:-10px;
	}
	#footer ul.social li a,
	#footer ul.quick-links li a{
		color:#ffffff;
	}
	#footer ul.social li a:hover{
		color:#eeeeee;
	}
	#footer ul.quick-links li{
		padding: 3px 0;
		-webkit-transition: .5s all ease;
		-moz-transition: .5s all ease;
		transition: .5s all ease;
	}
	#footer ul.quick-links li:hover{
		padding: 3px 0;
		margin-left:5px;
		font-weight:700;
	}
	#footer ul.quick-links li a i{
		margin-right: 5px;
	}
	#footer ul.quick-links li:hover a i {
	    font-weight: 700;
	}

	@media (max-width:767px){
		#footer h5 {
	    padding-left: 0;
	    border-left: transparent;
	    padding-bottom: 0px;
	    margin-bottom: 10px;
	}
	}

	/*estilos login  e inicio*/
	.carousel-item{
  margin: -2px;
  width: 100%;
  height: 400px;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}

@media (max-width: 600px) {
 .carousel-item {
  margin: -2px;
    height: 280px;
  }
}

.carousel-inner {
    min-height:300px;
}

.carousel-item.active {
    border:none;
}

body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
}
/*texto en la imagen*/
#texto1 {
	text-shadow: -2px -2px 1px #000, 2px 2px 1px #000, -2px 2px 1px #000, 2px -2px 1px #000;
}

#texto2 {
	text-shadow: -2px -2px 1px #000, 2px 2px 1px #000, -2px 2px 1px #000, 2px -2px 1px #000;
}
/*cuadro de menus*/
.info {
    margin-bottom: 0;
}

#info2 {
    background:#e9ecef;
    margin: 0px -40px 0px -40px;
}

#info3 {
    background:#191919;
    margin: 0px -40px 0px -40px
}
.pintar {
  color: #FFFFFF;
}

#footer {
    background:#191919;
    padding: 20px;
    margin: 0px -40px 0px -40px;
}


.card {
    box-shadow: 2px 5px 20px #777;
}

.modal-content {
    background:#004455;
}

.mn {
    color:#fff;
}


/*testimonios*/
.img1{
  width: 100%;
}

#testimonios {
    background:#2b2b2b;
    margin: 0px -40px 0px -40px;
}

.revs {
    padding: 100px;
}

.carousel-item.active {
    border:none;
}

.carousel-inner {
    min-height:300px;
}

/*inicio de login*/
.form-container{
  border: 1px solid #0190a2;
  padding: 50px 60px;

-webkit-box-shadow: 2px 2px 5px #999;
  -moz-box-shadow: 2px 2px 5px #999;
}

.abs-center {
  display: flex;
  align-items: center;
  justify-content: center;
}

/*patrocinadores*/
.portafolio{
  width: 100%;
  max-width: 1400px;
  margin: auto;
}

.portafolio h1{
  text-align: center;
  font-size: 20px;
  margin: 0px 0px 0px;
}

.portafolio-container{
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
  -webkit-justify-content: space-between;
  -ms-flex-pack: justify;
  justify-content: space-between;
}

.portafolio-item{
  width: 30%;
  position: relative;
  overflow: hidden;

}

.portafolio-img{
  -webkit-transition: all 0.5s;
  transition: all 0.5s;
  width: 100%;
}

.portafolio-text{
  position: absolute;
  bottom: 0;
  padding: 10px;

  background: rgba(0,0,0,0.7);
  color: #fff;
  -webkit-transform: translateY(100%);
  -ms-transform: translateY(100%);
  transform: translateY(100%);
  -webkit-transition: all 0.5s ease-out;
  transition: all 0.5s ease-out;
}

.portafolio-text p{
  text-align: justify;
}

.portafolio-item:hover .portafolio-text{
  -webkit-transform: translateY(0%);
  -ms-transform: translateY(0%);
  transform: translateY(0%);
}

.portafolio-item:hover .portafolio-img{
  -webkit-transform: scale(1.15);
  -ms-transform: scale(1.15);
  transform: scale(1.15);
}

.container-flu {
  height: 10px;
  margin: 0px -40px -20px -40px;
 }

/*efecto imagen fondo*/
#plx {
    background-attachment: fixed;
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    margin: 0px -40px -20px -40px;
}

.wtitle {
    padding: 150px 20px;
    text-shadow: -2px -2px 1px #000, 2px 2px 1px #000, -2px 2px 1px #000, 2px -2px 1px #000;
}

.wtitle h2 {
    font-size: 36px;
    font-weight: bold;
}

	</style>
