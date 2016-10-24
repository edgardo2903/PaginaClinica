<!DOCTYPE html>

<?
include("funcionesphp/funciones.php");
?>
<html >
	<head>
		<link type="image/x-icon" href="img/logo.ico" rel="shortcut icon"/>

		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta charset="UTF-8">

		<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap-select.css" />
		<link rel="stylesheet" type="text/css" href="css/font-awesome.css" />
		<link rel="stylesheet" type="text/css" href="css/jquery-ui.css" />
		<link rel="stylesheet" type="text/css" href="css/sweet-alert.css">
		<link href="css/style.css" rel="stylesheet">
		<link href="css/style-responsive.css" rel="stylesheet">
		<!--<link href='http://fonts.googleapis.com/css?family=Terminal+Dosis' rel='stylesheet' type='text/css' />-->
		<link rel="stylesheet" type="text/css" href="menu/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="menu/css/style1.css" />

		<script type="text/javascript" src="js/jquery-2.0.3.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui.js"></script>
		<!--Esto es un puente para evitar el conflicto del tooltip de jQuery UI y el de Boostrap-->
		<script type="text/javascript">$.widget.bridge('uitooltip', $.ui.tooltip);</script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/bootstrap-dialog.js"></script>
		<script type="text/javascript" src="js/bootstrap-select.js"></script>
		<script type="text/javascript" src="js/funciones.js"></script>
		<script type="text/javascript" src="js/jquery.blockUI.js"></script>
		<script type="text/javascript" src="js/jquery.bootstrap-autohidingnavbar.js"></script>
		<script type="text/javascript" src="js/sweet-alert.js"></script>
		<script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
		<script src="js/jquery.scrollTo.min.js"></script>
		<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
		<script src="js/common-scripts.js"></script>

		<title> La Clinica</title>

	</head>
	<!--********************************AQUI INICIO MENU******************************-->
	<header>
		<div class="menu_bar"">
			<a href="#" class="bt-menu"><span class="icon-list2"></span style="text-aling:center;" >Menu</a>
		</div>
		<img src="img/clinica_logo.png" id="log" class="logo img-responsive col-lg-2">		
		<nav >

			<ul>
				<li><a href="index.php" class="active"><span class="icon-house"></span>Inicio</a></li>
				<li class="submenu">
					<a href="#"><span class="icon-rocket"></span>La Clinica<span class="caret icon-arrow-down6"></span></a>
					<ul class="children">
						<li><a href="#">¿Quiénes Somos? <span class="icon-dot"></span></a></li>
						<li><a href="#">Reseña Histórica <span class="icon-dot"></span></a></li>
						<li><a href="#">Instalaciones<span class="icon-dot"></span></a></li>
					</ul>
				</li>
				<li class="submenu">
					<a href="#">
						<span class="icon-rocket"></span>Servicios Especiales<span class="caret icon-arrow-down6"></span>
					</a>
					<ul class="children">
						<li><a href="#">Hospitalización <span class="icon-dot"></span></a></li>
						<li><a href="#">Estudios Médicos <span class="icon-dot"></span></a></li>
						<li><a href="#">Exámenes<span class="icon-dot"></span></a></li>
						<li><a href="#">Cirugía<span class="icon-dot"></span></a></li>
					</ul>
				</li>
				<li><a href="index.php?var=p1&n=1Xc"><span class="icon-earth"></span>Doctores</a></li>
				<li><a href="index.php?var=p2&n=1cV&cita=Solicitar#cit"><span class="icon-earth"></span>Gestionar Citas</a></li>
				<li><a href="#"><span class="icon-earth"></span>Pacientes</a></li>
				<li><a href="#"><span class="icon-mail"></span>Contactanos</a></li>

			</ul>
		</nav>
			
	

	<!--   AQUI FIN MENU************************************************************ INICIO CARROUSEL    -->
	   
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
		    <ol class="carousel-indicators">
			    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		        <li data-target="#myCarousel" data-slide-to="1"></li>
		        <li data-target="#myCarousel" data-slide-to="2"></li>
	        </ol>
	        <div class="carousel-inner">
	            <div class="item active">
	                <img src="img/doctores.jpg" alt="">
	                <div class="carousel-caption">
	                    <h1 style="color: green;font-size: 300%;">Descripción Principal</h1>
	                    <p style="color: red; font-size: 200%;">Nuestra clínica cuenta con diversas áreas y servicios dedicados a la atención de nuestros pacientes y visitantes. Atenderlos como si fueran un familiar o un amigo, por lo que siempre velamos por lo mejor para cada un.</p>
			            <p><a class="btn btn-lg btn-primary" href="#" role="button">Ingresa Aquí</a></p>
	                </div>
	            </div>
	            <div class="item">
	  	            <img src="img/medico.jpg" alt="">
		        	<div class="carousel-caption">
		    	        <h1 style="color: green;font-size: 300%;">Nustras Instalaciones</h1>
		        	    <p style="color: #FF0DFF; font-size: 200%; text-align: left; ">La estructura física del INSTITUTO ha sido diseñada bajo un contexto vanguardista de Arquitectura Moderna y cumpliendo con las mas estrictas normas de ingeniería y de distribución funcional, brindándole al disfrute de nuestros pacientes, la combinación de un ambiente agradable y de perfecta armonía.</p><p><a class="btn btn-lg btn-primary" href="#" role="button">Ingresa Aquí</a></p>
		            </div>
		        </div>
		        <div class="item">
		            <img src="img/exam21.jpg" alt="">
		            <div class="carousel-caption">
		                <<h1 style="color: green;font-size: 300%;">Visión.</h1>
		                <p style="color: black; font-size: 200%; text-align: left;">Que seamos reconocidos como una institución de Atención Médica Modelo en todos los ámbitos médicos, estructura física, equipos de última tecnología y personal altamente calificado para prestar un excelente servicio médico a la Comunidad..</p><p><a class="btn btn-lg btn-primary" href="#" role="button">Ingresa Aquí</a></p>
		            </div>
		        </div>
		    </div>
		    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
		    <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
		</div>
	</header>

	 <!-- Carousel FIN    ================================================== INICIO PANEL -->

	<body>

		<?php
		//include("includes/Principal.php");
			
			if(empty($_REQUEST["var"]) || ($_REQUEST["var"]=="" || $_REQUEST["var"]== undefined) ){
				include("pages/principal.php");
				
			}elseif($_REQUEST["var"] == "p1"){
				include("doctores/doctores.php");
			}elseif($_REQUEST["var"] == "p2"){
				include("citas/citas.php");
			}
			if($_REQUEST["var"]==1 && $_SESSION["aut"]=="SI")				{
					include("includes/menu.php");
			}
		?>

		<a href="#" class="scroll-top">Ir Arriba</a>
	</body>
		<!--   FIN PANEL    ************************************** INICIO FOOTER-->
	<footer style="background-color: #2FCC72;padding-top:2%;padding-bottom:1%;">
		<p class="pull-right"><a href="#">Back to top</a></p>
		<?php 
			include("contador.php"); 
		?>
	    <p>© Telematica FN C.A. · <a href="#">Privado</a> · <a href="#">Terminos de Seguridad</a></p>
	    <p>Contactos · <a href="#"></a> · <a href="#">04162416347  @E-mail: telematicafnca@gmail.com</a></p>
	</footer>
	
	<div id="mensaje"></div>
	<div style="width:100%;height:65px;"></div>
</html>
	

<!--   FIN PAGE    ************************************** INICIO SCRIPT JS // CSS-->

<script type="text/javascript">
	$(document).ready(function() 
		{ 
		$("#user").focus();
	});

	function enter(e)
		{
		if(e.keyCode==13)
			{
			validar();
		}
	}

	function validar()
		{
		if($("#user").val()=="")
			{
				$("#user").popover("show");
				return false;
			}

		if($("#pass").val()=="")
			{
				$("#pass").popover("show");
				return false;
		}

	$(document).ready(function() 
		{ 
		$("#spin_bt").show("fast");

	    $.blockUI({ css: { 
	        border: 'none', 
	        padding: '15px', 
	        backgroundColor: '#000', 
	        '-webkit-border-radius': '10px', 
	        '-moz-border-radius': '10px', 
	        opacity: .5, 
	        color: '#fff' 
	    } }); 
		var destino=$("#mensaje");

		$("#accion").val("iniciosesion");
		$.post("verifica.php", $("#form1").serialize(), function(resp)
			{
     		$("#spin_bt").hide("fast");
			var json = eval("(" + resp + ")");
			setTimeout($.unblockUI); 
			if(json.result==true)
				{
				$("#form1")[0].reset();
				$("#div_form_sesion").css("display","none");
				//crear_dialog("Informaci&oacute;n",json.mensaje,"","reload");
				crear_modal("Bienvenido","Datos correctos","success","","window.location.reload()","");
				//window.location.reload();
			}
			else{
				crear_modal("","Error: Usuario o Clave incorrecta","error","","","");
			}
		});
	}); 
}
		$(function() {
	    //Se activa cuando el scroll supera los 100px
	    $(window).scroll(function() {
	        if ($(this).scrollTop() > 100) {
	            $('a.scroll-top').fadeIn();
	        } else {
	            $('a.scroll-top').fadeOut();
	        }
	    });
	    //Crea la animacion al dar clic sobre el boton
	    $('a.scroll-top').click(function() {
	        $("html, body").animate({scrollTop: 0}, 600);
	        return false;
	    });
	});


	//Script del Menu

	$(document).ready(main);
	 
	var contador = 1;
	 
	function main () {
	$('.menu_bar').click(function(){
	if (contador == 1) {
	$('nav').animate({
	left: '0'
	});
	contador = 0;
	} else {
	contador = 1;
	$('nav').animate({
	left: '-100%'
	});
	}
	});
	 
	// Mostramos y ocultamos submenus
	$('.submenu').click(function(){
	$(this).children('.children').slideToggle();
	});
	}

</script>


<style type="text/css">
	.panel-heading{
		/*font-family: 'Aubrey';*/
	}
	.panel-heading,.modal-header{
		background-color:#DEEBFA !important;
	}
	.panel-default{
		box-shadow: 2px 2px 7px rgb(102, 153, 210) !important;
	}
	.modal-header{
		border-top-right-radius: 4px;
		border-top-left-radius: 4px;
	}
	.form-control:focus{
		border-color: #3995EF !important;
		box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(73, 205, 236, 0.6) !important;
	}
	body{
		background: rgba(220, 237, 250, 1);
		background: -moz-linear-gradient(top, rgba(220, 237, 250, 1) 0%, rgba(255,255,255,1) 100%);
		background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(220, 237, 250, 1)), color-stop(100%, rgba(255,255,255,1)));
		background: -webkit-linear-gradient(top, rgba(220, 237, 250, 1) 0%, rgba(255,255,255,1) 100%);
		background: -o-linear-gradient(top, rgba(220, 237, 250, 1) 0%, rgba(255,255,255,1) 100%);
		background: -ms-linear-gradient(top, rgba(220, 237, 250, 1) 0%, rgba(255,255,255,1) 100%);
		background: linear-gradient(to bottom, rgba(220, 237, 250, 1) 0%, rgba(255,255,255,1) 100%);
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#edfaf2', endColorstr='#ffffff', GradientType=0 );
		background-repeat: no-repeat;
		background-attachment: fixed;
		height: 100%;
	}

	/*
	CSS del Menu
	*/

	* {
	padding:0;
	margin:0;
	-webkit-box-sizing: border-box;
	-moz-box-sizing: border-box;
	box-sizing: border-box;
	}

	.logo {

		max-width: 12%;
		max-height: 1%;
		margin-top: 0;
		margin-left: 2%;
	}

	.menuvert{

		margin-left: 0;
	}

	.menu_bar {
	display:none;
	}
	 
	header {
	width: 100%;
	}
	 
	header nav {
	background:#2FCC72;
	z-index:1000;
	max-width: 1000px;
	width:100%;
	margin:20px auto;
	}
	 
	header nav ul {
	list-style:none;
	}
	 
	header nav ul li {
	display:inline-block;
	position: relative;
	}
	 
	header nav ul li:hover {
	background:#E6344A;
	}
	 
	header nav ul li a {
	color:#fff;
	display:block;
	text-decoration:none;
	padding: 20px;
	}
	 
	header nav ul li a span {
	margin-right:10px;
	}
	 
	header nav ul li:hover .children {
	display:block;
	}
	 
	header nav ul li .children {
	display: none;
	background:#011826;
	position: absolute;
	width: 150%;
	z-index:1000;
	}
	 
	header nav ul li .children li {
	display:block;
	overflow: hidden;
	border-bottom: 1px solid rgba(255,255,255,.5);
	}
	 
	header nav ul li .children li a {
	display: block;
	}
	 
	header nav ul li .children li a span {
	float: right;
	position: relative;
	top:3px;
	margin-right:0;
	margin-left:10px;
	}
	 
	header nav ul li .caret {
	position: relative;
	top:3px;
	margin-left:10px;
	margin-right:0px;
	}
	 
	@media screen and (max-width: 800px) {
	body {
	padding-top:80px;
	}

	.menu_bar {
	display:block;
	width:100%;
	position: fixed;
	top:0;
	background:#E6344A;
	}
	 
	.menu_bar .bt-menu {
	display: block;
	padding: 20px;
	color: #fff;
	overflow: hidden;
	font-size: 25px;
	font-weight: bold;
	text-decoration: none;
	}
	 
	.menu_bar span {
	float: right;
	font-size: 40px;
	}
	 
	header nav {
	width: 80%;
	height: calc(100% - 80px);
	position: fixed;
	right:100%;
	margin: 0;
	overflow: scroll;
	}
	 
	header nav ul li {
	display: block;
	border-bottom:1px solid rgba(255,255,255,.5);
	}
	 
	header nav ul li a {
	display: block;
	}
	 
	header nav ul li:hover .children {
	display: none;
	}
	 
	header nav ul li .children {
	width: 100%;
	position: relative;
	}
	 
	header nav ul li .children li a {
	margin-left:20px;
	}
	 
	header nav ul li .caret {
	float: right;
	}
	}
	html { overflow-x:hidden; }
</style>
