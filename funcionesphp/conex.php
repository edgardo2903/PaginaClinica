<?php
$enlace=mysqli_connect("localhost","root","e19725326r") or die ("Error en conexi&oacute;n: ".mysqli_error($enlace));
		mysqli_select_db($enlace,"clinica") or die ("Error en conexi&oacute;n a la BD: ".mysqli_error($enlace));
?>