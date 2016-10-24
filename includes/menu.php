<style type="text/css">
	.fondo_tabs{
		background: rgba(218,244,250,1);
		background: -moz-linear-gradient(left, rgba(218,244,250,1) 0%, rgba(255,255,255,1) 100%);
		background: -webkit-gradient(left top, right top, color-stop(0%, rgba(218,244,250,1)), color-stop(100%, rgba(255,255,255,1)));
		background: -webkit-linear-gradient(left, rgba(218,244,250,1) 0%, rgba(255,255,255,1) 100%);
		background: -o-linear-gradient(left, rgba(218,244,250,1) 0%, rgba(255,255,255,1) 100%);
		background: -ms-linear-gradient(left, rgba(218,244,250,1) 0%, rgba(255,255,255,1) 100%);
		background: linear-gradient(to right, rgba(218,244,250,1) 0%, rgba(255,255,255,1) 100%);
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#daf4fa', endColorstr='#ffffff', GradientType=1 );
		background-repeat: no-repeat;
		background-attachment: fixed;
	}
	.div_nombre{
	line-height: 3;
	}
	.nav > li > a:hover{
	background-color: #FFFFFF;
	}
	.nav .open > a:focus{
		background-color: #DEE2F1;
	}
	.nav-tabs > li > a {
	border: 0;
	border-radius: 10px;
	height: 42;
	}
</style>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header" style="margin-left: -40px;">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
    </div>

<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1"> <!-Con esto se expande cuando las dimensiones de la pantalla son pocas->
    <ul class="nav navbar-nav">
      <div class="sidebar-toggle-box">
          <div class="fa fa-bars" data-toggle="tooltip" data-placement="right" data-original-title="Cerrar men&uacute; principal"></div>
      </div>
      <li><a href="#">I.V.A.: <?=$_SESSION["iva"];?>%</a></li>
      <!--<li><a href="#">I.S.L.R.: <?=$_SESSION["islr"];?>%</a></li>-->
      <li><a href="#">M.G.: <?=$_SESSION["margenG"];?>%</a></li>
      <!--<li><a href="#">Almac&eacute;n: <?=$_SESSION["idAlmacen"];?></a></li>-->
	</ul>
	 <ul class="nav navbar-nav navbar-right">
	 	<!-- <li><a style="cursor:context-menu;"><b>Bienvenido: <?=$_SESSION["nombre"];?></b></a></li> -->
<!---->
                    <li><a href="#"><b>Fecha: </b>&nbsp;<?=date("d/m/Y")?></a></li>
                    <li><a href="#"><b>Hora: </b>&nbsp;<div style="float:right;" id="Dhora" name="Dhora"></div></a></li>
                    <li>&nbsp;</li>
                    <li>&nbsp;</li>
                    <li>&nbsp;</li>
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="index.php#">
                            <b data-toggle="tooltip" data-placement="left" data-original-title="Abrir configuraci&oacute;n">Bienvenido: <?=$_SESSION["nombre"];?></b>
                        </a>
                        <ul class="dropdown-menu extended tasks-bar">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">Configuraci&oacute;n</p>
                            </li>
                            <li>
                                <a href="?opt=<?=base64_encode("16")?>">
                                    <div class="task-info">
                                        <div class="desc">Cambiar contrase&ntilde;a</div>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </li>
<!---->
	 	<li><a href="#" onClick="window.open('includes/cerrar.php','_parent')"><i class="fa fa-sign-out"></i> Cerrar sesi&oacute;n</a></li>
	 </ul>
</div>
  </div>
</nav>

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar" class="nav-collapse" style="overflow:auto !important;">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  
                  <p class="centered"><a href="index.php"><img src="img/Binicio.png" style="height: 60px;"></a></p>
              	  <!-- <h5 class="centered"><label>Administrativo</label></h5> -->
              	
              	<?
              	session_start();
              	//===> Consulta de modulos
              	$sql=mysqli_query($enlace,"SELECT * 
              							   FROM modulos_sistema ms
              							   INNER JOIN modulos_usuarios mu ON (ms.id_modulo=mu.id_modulo)
              							   WHERE ms.estatus=1 
              							   AND mu.tipo_user={$_SESSION["tipoUser"]}
              							   ORDER BY ms.orden ASC");
              	while($rsM=mysqli_fetch_assoc($sql))
              	{
                    //====> Iconos
                    if($rsM["icono"]!="")
                        $icono="<i style='' class='fa fa-".$rsM['icono']."'></i>";
                    else
                        $icono="";
                  ?>
              		<!--Muestro modulos-->
                  	<li class="sub-menu">
                      	<a href="javascript:;">
                        	<span><?=$icono.utf8_encode($rsM["modulo"]);?></span>
                      	</a>
                      	<?
                      	//===> Consulta de programas por modulos
                      		$sql_prog=mysqli_query($enlace,"SELECT * 
                      									    FROM programas_sistema ps
                      									    INNER JOIN programa_usuarios pu ON (ps.id_programa=pu.id_programa)
                      									    WHERE ps.estatus=1 
                      									    AND pu.tipo_user={$_SESSION["tipoUser"]}
                      									    AND ps.id_modulo={$rsM["id_modulo"]} 
                      									    ORDER BY ps.orden ASC") or die("Error: ".mysqli_error($enlace));
                      		$nP=mysqli_num_rows($sql_prog);
                      		if($nP>0)
                      		{			?>
                      	<!--Muestro Programas del modulo-->
                      	<ul class="sub"><?

                      			while($rsP=mysqli_fetch_assoc($sql_prog))
                      			{
                      				?><li class="active"><a  href="?val=1&opt=<?=base64_encode($rsP["opt"])?>"><em><?=utf8_encode($rsP["nombre_programa"])?></em></a></li><?
                        		}
                        ?></ul>
                  	</li>
                    <hr style="width:100%; margin-top:0px !important; margin-bottom:0px !important;">
                    <?
                  			}

              			}?>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
<div class="container" style="width:86%;">

<div style="height:43px;border-radius: 8px;margin-bottom:25px;"></div>
<!-- Nav tabs -->
</div>

<div class="container" id="divCont">
<?
	if(!empty($_REQUEST["opt"]))
	{
    $opt=base64_decode($_REQUEST["opt"]);
		$sql=mysqli_query($enlace,"SELECT * FROM programas_sistema WHERE opt=$opt") or die("Error: ".mysqli_error($enlace));
		$prog=mysqli_fetch_assoc($sql);
		
		if(mysqli_num_rows($sql)>0)
    {
      if(file_exists($prog["ruta"]))
      {
        if($opt!=16) //==> El archivo de cambio de pass no entra aqui...
        {
          //===> Reviso si ese usuario tiene permiso a ese programa
          $sqlPermiso=mysqli_query($enlace,"SELECT * FROM programa_usuarios WHERE id_programa={$prog["id_programa"]} AND tipo_user={$_SESSION["tipoUser"]} ");
  			  if(mysqli_num_rows($sqlPermiso)>0)
            include($prog["ruta"]);
          else
            include("includes/denegado.php");
        }
        else
          include($prog["ruta"]);
      }
      else
      {
        include("includes/no_existe.php");
      }
    }
	}
?>

</div>
<script type="text/javascript">
relojillo("Dhora");
	 $("nav.navbar-fixed-top").autoHidingNavbar();
	 $("nav.navbar-fixed-top").autoHidingNavbar("setShowOnUpscroll",false);
	 $("nav.navbar-fixed-top").autoHidingNavbar("setShowOnBottom",false);
	 $("nav.navbar-fixed-top").autoHidingNavbar("setAnimationDuration",350);

	$(".sidebar-toggle-box").click(function() {
		if($("#sidebar").css("display")=="block")
		{
	  		$("#sidebar").css("display","none");
	  		$(".fa-bars").attr("data-original-title","Abrir menú principal");
	  		//$("#divCont").css("margin-left","0px");
		}
	  	else
	  	{
	  		$("#sidebar").css("display","block");
	  		$(".fa-bars").attr("data-original-title","Cerrar menú principal");
	  		//$("#divCont").css("margin-left","210px");
	  	}
	});

	var opt="<?=$_REQUEST['opt']?>";
	if(opt!="" && opt!=undefined)
	{
	  	$("#sidebar").css("display","none");
	  	$(".fa-bars").attr("data-original-title","Abrir menú principal");		
	}
</script>