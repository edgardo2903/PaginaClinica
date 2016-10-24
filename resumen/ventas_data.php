<?php
include("../funcionesphp/funciones.php");
//var_dump($_REQUEST); die();
/*$idproducto 	= $_REQUEST["idproducto"];
$nombre 		= utf8_decode($_REQUEST["nombre"]);
$descripcion  	= utf8_decode($_REQUEST["descripcion"]);
$estatus   		= $_REQUEST["estatus"];
$categoria   	= $_REQUEST["categoria"];
$costo   	    = formateaMonto($_REQUEST["costo"]);
$cantidad   	= $_REQUEST["cantidad"];
$factura   	    = $_REQUEST["factura"];
$fechaG    	    = ConvFecha($_REQUEST["fecha"]);
$accion   		= $_REQUEST["accion"];
$dato   		= utf8_decode($_REQUEST["dato"]);*/

$tipo   	    = $_REQUEST["tipo"];
$mes   	        = $_REQUEST["mes"];
$fechad   	    = ConvFecha($_REQUEST["fechad"]);
$fechah   	    = ConvFecha($_REQUEST["fechah"]);
$hoy            = date("Y-m-d");
$Hoy_ver        = date("d/m/Y");
$hora           = date("h:i:s A");
$ano            = date('Y');
$total          = 0;
//Filtros


switch ($tipo) {
	case 'x':

		$sql = "SELECT * FROM ventas inner join producto ON producto.id_producto = ventas.idproducto where fecha_venta = $hoy";
		$result = mysqli_query($enlace,$sql);

		$search = mysqli_fetch_assoc($result);

		$costo_venta = porcentaje($costo,$search['valor']);

		$sql = "INSERT INTO producto (nombre_producto, descripcion_producto, stock, precio, id_categoria, status) VALUES ('$nombre','$descripcion', '$cantidad', '$costo_venta', '$categoria', '$estatus')";
		$result = mysqli_query($enlace,$sql);

		
		if(!$result){
			echo json_encode(array("result"=>false,"msg"=>"Hubo un error."));

		}else{
			echo json_encode(array("result"=>true,"msg"=>"El almacen se ha registrado satisfactoriamente."));
				$sql1 = "SELECT id_producto FROM producto order by id_producto desc LIMIT 1";
				$result1 = mysqli_query($enlace,$sql1);

				$id_S = mysqli_fetch_assoc($result1);
				$id = $id_S['id_producto'];

				$sql2 = "INSERT INTO producto_detalle (id_producto, factura, costo, cantidad, fecha) VALUES ('$id','$factura', '$costo', '$cantidad', '$fechaG')";
				$result2 = mysqli_query($enlace,$sql2);

		}
		break;

	case 'modificar':

		$sql = "SELECT valor FROM ganancia_total ";
		$result = mysqli_query($enlace,$sql);

		$search = mysqli_fetch_assoc($result);

		$costo_venta = porcentaje($costo,$search['valor']);

		$sql = "SELECT stock FROM producto where id_producto = $idproducto";
		$result   = mysqli_query($enlace,$sql);
		$busqueda = mysqli_fetch_assoc($result);
		if ($cantidad == '' or $cantidad == undefined) {
			$cantidad = 0;
		}
		$stock_new = $busqueda['stock'] + $cantidad;

			

		$sql = "UPDATE producto SET nombre_producto='$nombre',descripcion_producto='$descripcion',status='$estatus',id_categoria='$categoria', stock = '$stock_new', precio = '$costo_venta' WHERE id_producto='$idproducto'";
		$result = mysqli_query($enlace,$sql);

		$sql = "UPDATE producto_detalle SET factura='$factura', costo ='$costo', cantidad = '$cantidad', fecha = '$fechaG' WHERE id_producto='$idproducto'";
		$result = mysqli_query($enlace,$sql);

		//$sql2 = "INSERT INTO producto_detalle (id_producto, factura, precio, cantidad, fecha) VALUES ('$idproducto','$factura', '$costo', '$cantidad', '$fechaG')";
		//$result2 = mysqli_query($enlace,$sql2);

		if(!$result){
			echo json_encode(array("result"=>false,"msg"=>"Hubo un error."));
		}else{
			echo json_encode(array("result"=>true,"msg"=>"El almacen se ha modificado satisfactoriamente."));
		}
		break;

	case 'eliminar':
		$sql = "DELETE FROM almacen WHERE idalmacen=$idalmacen";
		$result = mysqli_query($enlace,$sql);

		if(!$result){
			echo json_encode(array("result"=>false,"msg"=>"Hubo un error."));
		}else{
			echo json_encode(array("result"=>true,"msg"=>"El almacen se ha eliminado satisfactoriamente."));
		}
		break;
	
	case '1':

	//establecemos los limites de la página actual
		$sql = mysqli_query($enlace,"SELECT * FROM  `ventas` WHERE  `fecha_venta` =  '$hoy'");
				//SELECT campo, count(*) as num FROM tabla GROUP BY campo ORDER BY num
		$cant_registros =mysqli_num_rows($sql);
		
		$sql = "SELECT * FROM ventas inner join producto ON producto.id_producto = ventas.id_producto where `fecha_venta` =  '$hoy'";
		$result = mysqli_query($enlace,$sql);
		

		if(!$result){
			echo json_encode(array("result"=>false,"msg"=>"Hubo un error aqui."));
		}else{
			exportar();?>
		 <div id="Exportar_tabla">
		 		<p style="text-align:center; font-size:16px; color:black" >JULIET FASHION RIF: ******** TELEFONOS *******</p>
		 		
		 		<p style="text-align:center;" >REPORTE DEL DIA <?php  echo $Hoy_ver; ?> a las <?php echo $hora; ?></p>
			<table border="1" width="100%" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-responsive">
				<thead style='background-color: rgba(208, 213, 216, 0.69);'>
					<tr>
						<th align="center" style="background-color:#D3D3D3;">N&ordm;</th>
						<th align="center" style="background-color:#D3D3D3;">Nombre</th>
						<th align="center" style="background-color:#D3D3D3;">Fecha</th>
						<th align="center" style="background-color:#D3D3D3;">Precio</th>
												
						
					</tr>
				</thead>
			<?php
			$i = 1;
			//($result);
			if($cant_registros>0){
				while ($almacen = mysqli_fetch_assoc($result)) {
				?>
				<tr>
					<td><?= $i ?></td>
					<td align="center"><?= utf8_encode($almacen["nombre_producto"]) ?></td>
					<td><?= DevuelveFecha($almacen["fecha_venta"]) ?></td>
					
					
					<td><?= $almacen["precio"] ?></td>

					
				</tr>
				
				<?php
					$total = $total + $almacen["precio"];
					$i++;
					$x = $i -1;
				}
			}
			else{
				?>
				<tr><td colspan="4">No se han encontrado resultados aqui.</td></tr>
				<?php
			}
			?>
			</table>
			<br>
			<table border="1" width="100%" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-responsive">
				<tr>
					<th align="center" style="background-color:#D3D3D3;">Total de Productos Vendidos</th>
					<th align="center" style="background-color:#D3D3D3;">Total en Dinero (Bs)</th>
				</tr>
				<tr>
					<td><?php echo $x; ?></td>
					<td><?php echo $total; ?></td>
				</tr>
			</table>
			</div>
			</div>
			<div><?= paginacion($paginado,$n_pag) ?></div>
			</div>
			</div>
			</div>
			<?php
		}
		break;
		case '2':
		$fecha_consulta = $ano."-".$mes;
	//establecemos los limites de la página actual
		$sql = mysqli_query($enlace,"SELECT * FROM  `ventas` WHERE  `fecha_venta` LIKE '$fecha_consulta%'");
				//SELECT campo, count(*) as num FROM tabla GROUP BY campo ORDER BY num
		$cant_registros =mysqli_num_rows($sql);
		
		$sql = "SELECT * FROM ventas inner join producto ON producto.id_producto = ventas.id_producto where `fecha_venta` LIKE '$fecha_consulta%' order by fecha_venta";
		$result = mysqli_query($enlace,$sql);
		

		if(!$result){
			echo json_encode(array("result"=>false,"msg"=>"Hubo un error aqui."));
		}else{
			exportar();?>
		 <div id="Exportar_tabla">
		 		<p style="text-align:center; font-size:16px; color:black" >JULIET FASHION RIF: ******** TELEFONOS *******</p>
		 		
		 		<p style="text-align:center;" >REPORTE REALIZADO EL DIA <?php  echo $Hoy_ver; ?> a las <?php echo $hora; ?></p>
			<table border="1" width="100%" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-responsive">
				<thead style='background-color: rgba(208, 213, 216, 0.69);'>
					<tr>
						<th align="center" style="background-color:#D3D3D3;">N&ordm;</th>
						<th align="center" style="background-color:#D3D3D3;">Nombre</th>
						<th align="center" style="background-color:#D3D3D3;">Fecha</th>
						<th align="center" style="background-color:#D3D3D3;">Precio</th>
												
						
					</tr>
				</thead>
			<?php
			$i = 1;
			//($result);
			if($cant_registros>0){
				while ($almacen = mysqli_fetch_assoc($result)) {
				?>
				<tr>
					<td><?= $i ?></td>
					<td align="center"><?= utf8_encode($almacen["nombre_producto"]) ?></td>
					<td><?= DevuelveFecha($almacen["fecha_venta"]) ?></td>
					
					
					<td><?= $almacen["precio"] ?></td>

					
				</tr>
				
				<?php
					$total = $total + $almacen["precio"];
					$i++;
					$x = $i -1;
				}
			}
			else{
				?>
				<tr><td colspan="4">No se han encontrado resultados aqui.</td></tr>
				<?php
			}
			?>
			</table>
			<br>
			<table border="1" width="100%" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-responsive">
				<tr>
					<th align="center" style="background-color:#D3D3D3;">Total de Productos Vendidos</th>
					<th align="center" style="background-color:#D3D3D3;">Total en Dinero (Bs)</th>
				</tr>
				<tr>
					<td><?php echo $x; ?></td>
					<td><?php echo $total; ?></td>
				</tr>
			</table>
			</div>
			</div>
			<div><?= paginacion($paginado,$n_pag) ?></div>
			</div>
			</div>
			</div>
			<?php
		}
		break;
		case '3':
		//establecemos los limites de la página actual
		$sql = mysqli_query($enlace,"SELECT * FROM  `ventas` WHERE  `fecha_venta` BETWEEN '$fechad' AND '$fechah'");
				//SELECT campo, count(*) as num FROM tabla GROUP BY campo ORDER BY num
		$cant_registros =mysqli_num_rows($sql);
		
		$sql = "SELECT * FROM ventas inner join producto ON producto.id_producto = ventas.id_producto where `fecha_venta` BETWEEN '$fechad' AND '$fechah' order by fecha_venta";
		$result = mysqli_query($enlace,$sql);
		

		if(!$result){
			echo json_encode(array("result"=>false,"msg"=>"Hubo un error aqui."));
		}else{
			exportar();?>
		 <div id="Exportar_tabla">
		 		<p style="text-align:center; font-size:16px; color:black" >JULIET FASHION RIF: ******** TELEFONOS *******</p>
		 		
		 		<p style="text-align:center;" >REPORTE REALIZADO EL DIA <?php  echo $Hoy_ver; ?> a las <?php echo $hora; ?></p>
			<table border="1" width="100%" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-responsive">
				<thead style='background-color: rgba(208, 213, 216, 0.69);'>
					<tr>
						<th align="center" style="background-color:#D3D3D3;">N&ordm;</th>
						<th align="center" style="background-color:#D3D3D3;">Nombre</th>
						<th align="center" style="background-color:#D3D3D3;">Fecha</th>
						<th align="center" style="background-color:#D3D3D3;">Precio</th>
												
						
					</tr>
				</thead>
			<?php
			$i = 1;
			//($result);
			if($cant_registros>0){
				while ($almacen = mysqli_fetch_assoc($result)) {
				?>
				<tr>
					<td><?= $i ?></td>
					<td align="center"><?= utf8_encode($almacen["nombre_producto"]) ?></td>
					<td><?= DevuelveFecha($almacen["fecha_venta"]) ?></td>
					
					
					<td><?= $almacen["precio"] ?></td>

					
				</tr>
				
				<?php
					$total = $total + $almacen["precio"];
					$i++;
					$x = $i -1;
				}
			}
			else{
				?>
				<tr><td colspan="4">No se han encontrado resultados aqui.</td></tr>
				<?php
			}
			?>
			</table>
			<br>
			<table border="1" width="100%" cellpadding="0" cellspacing="0" class="table table-bordered table-striped table-condensed table-responsive">
				<tr>
					<th align="center" style="background-color:#D3D3D3;">Total de Productos Vendidos</th>
					<th align="center" style="background-color:#D3D3D3;">Total en Dinero (Bs)</th>
				</tr>
				<tr>
					<td><?php echo $x; ?></td>
					<td><?php echo $total; ?></td>
				</tr>
			</table>
			</div>
			</div>
			<div><?= paginacion($paginado,$n_pag) ?></div>
			</div>
			</div>
			</div>
			<?php
		}
		break;
}


?>