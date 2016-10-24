<?php
include("../funcionesphp/funciones.php");
//var_dump($_REQUEST); die();
$idproducto 	= $_REQUEST["idproducto"];
$nombre 		= utf8_decode($_REQUEST["nombre"]);
$descripcion  	= utf8_decode($_REQUEST["descripcion"]);
$estatus   		= $_REQUEST["estatus"];
$categoria   	= $_REQUEST["categoria"];
$costo   	    = formateaMonto($_REQUEST["costo"]);
$cantidad   	= $_REQUEST["cantidad"];
$factura   	    = $_REQUEST["factura"];
$fechaG    	    = ConvFecha($_REQUEST["fecha"]);
$accion   		= $_REQUEST["accion"];
$dato   		= utf8_decode($_REQUEST["dato"]);
$fechaHoy        = date("Y-m-d");

//Filtros

$filnombre 		= $_REQUEST["filnombre"];
if($filnombre!=""){
	$fil = "nombre LIKE '%$filnombre%'";
}
$filestatus 	= $_REQUEST["filestatus"];
if($filestatus!=""){
	if($fil!=""){ $fil .= " AND "; }
	$fil = $fil."estatus = '$filestatus'";
}
$filresponsalble = $_REQUEST["filresponsalble"];
if($filresponsalble!=""){
	if($fil!=""){ $fil .= " AND "; }
	$fil = $fil."id_user = '$filresponsalble'";
}

if($fil!=""){ $fil = "WHERE ".$fil; }

switch ($accion) {
	case 'guardar':
		
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

				$sql2 = "INSERT INTO producto_detalle (id_producto, factura, precio, cantidad, fecha) VALUES ('$id','$factura', '$costo', '$cantidad', '$fechaG')";
				$result2 = mysqli_query($enlace,$sql2);

		}
		break;

	case 'modificar':
		$sql = "UPDATE almacen SET nombre='$nombre',descripcion='$descripcion',estatus='$estatus',id_user='$responsable' WHERE idalmacen='$idalmacen'";
		$result = mysqli_query($enlace,$sql);

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
		
	case 'vender':

		$sql = "SELECT stock FROM producto where id_producto = '$idproducto' ";
		$result = mysqli_query($enlace,$sql);

		$search = mysqli_fetch_assoc($result);

		$stock_new = $search['stock'] - 1;

		$sql = "UPDATE producto SET stock = $stock_new WHERE id_producto ='$idproducto'";
		$result = mysqli_query($enlace,$sql);


		$sql2 = "INSERT INTO ventas (id_producto, fecha_venta) VALUES ('$idproducto', '$fechaHoy')";
		$result2 = mysqli_query($enlace,$sql2);


		if(!$result){
			echo json_encode(array("result"=>false,"msg"=>"Hubo un error 2."));
		}else{
			echo json_encode(array("result"=>true,"msg"=>"Se ha Registrado la Venta."));
		}
		break;
	
	case 'consultar':

	//establecemos los limites de la página actual
	if ($_POST['pg']=="") 
		$n_pag = 1; 

	else  
		$n_pag=$_POST['pg']; 
	$cantidad=50;
	$inicial = ($n_pag-1) * $cantidad;

		//$sql=mysqli_query($enlace,"SELECT * FROM almacen $fil") or die ("Error: ".mysqli_error($enlace));
		$sql = mysqli_query($enlace,"SELECT * FROM producto order by id_producto asc ");
		$cant_registros =mysqli_num_rows($sql);
		$paginado = intval($cant_registros / $cantidad);

		//$sql = "SELECT * FROM almacen LEFT JOIN users USING(id_user) $fil";
		$sql = "SELECT * FROM producto order by id_producto asc  ";
		$result = mysqli_query($enlace,$sql);

		if(!$result){
			echo json_encode(array("result"=>false,"msg"=>"Hubo un error."));
		}else{
			?>
			<table class='table table-bordered table-striped'>
				<thead style='background-color: rgba(208, 213, 216, 0.69);'>
					<tr>
						<th>N&ordm;</th>
						<th>Nombre</th>
						<th>Precio</th>
						<th>Vender</th>
						<th>Stock</th>						
						<th>Descripción</th>
						
					</tr>
				</thead>
			<?php
			$i = 1;
			//($result);
			if($cant_registros>0){
				while ($almacen = mysqli_fetch_assoc($result)) {
				?>
				<tr>
					<td><?= $i?></td>
					<td><?= utf8_encode($almacen["nombre_producto"]) ?></td>
					<td><?= $almacen["precio"]?></td>
					
					<td width="12%" align="center">
						<button type="button" class="btn btn-success btn-sm" title="Producto Vendido" data-toggle="modal" data-target="#modal-almacen<?=$almacen["id_producto"];?>"><i class="fa fa-money fa-lg"></i></button>
					</td>
					<td><?= $almacen["stock"] ?></td>
					<td><?= $almacen["descripcion_producto"] ?></td>
					
					
				</tr>
				<!--Modal de eliminar almacen-->
				<div id="modal-almacen<?=$almacen["id_producto"];?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-sm">
				    <div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							<h4 class="modal-title">Producto Vendido</h4>
						</div> <!--Header-->
						<div class="modal-body">
							<p style="text-align:center;">Producto Seleccionado: "<?=utf8_encode($almacen["nombre_producto"])?>"</p>
						</div> <!--Body-->
				    	<div class="modal-footer">
				        	<button type="button" class="btn btn-success" onclick="vender('<?=$almacen["id_producto"];?>')" data-dismiss="modal">VENDIDO</button>
				        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				      	</div> <!--Footer-->
				    </div> <!--Content-->
				  </div>
				</div>
				<?php
					$i++;
				}
			}
			else{
				?>
				<tr><td colspan="4">No se han encontrado resultados.</td></tr>
				<?php
			}
			?>
			</table>
			</div>
			<div><?= paginacion($paginado,$n_pag) ?></div>
			</div>
			</div>
			</div>
			<?php
		}
		break;
		case 'consultar2':


	//establecemos los limites de la página actual
	if ($_POST['pg']=="") 
		$n_pag = 1; 

	else  
		$n_pag=$_POST['pg']; 
	$cantidad=50;
	$inicial = ($n_pag-1) * $cantidad;

		//$sql=mysqli_query($enlace,"SELECT * FROM almacen $fil") or die ("Error: ".mysqli_error($enlace));
		$sql = mysqli_query($enlace,"SELECT * FROM producto  where nombre_producto LIKE '$dato%' order by id_producto asc ");
		$cant_registros =mysqli_num_rows($sql);
		$paginado = intval($cant_registros / $cantidad);

		//$sql = "SELECT * FROM almacen LEFT JOIN users USING(id_user) $fil";
		$sql = "SELECT * FROM producto where nombre_producto LIKE '$dato%' order by id_producto asc  ";
		$result = mysqli_query($enlace,$sql);

		if(!$result){
			echo json_encode(array("result"=>false,"msg"=>"Hubo un error."));
		}else{
			?>
			<table class='table table-bordered table-striped'>
				<thead style='background-color: rgba(208, 213, 216, 0.69);'>
					<tr>
						<th>N&ordm;</th>
						<th>Nombre21</th>
						<th>Precio</th>
						<th>Vender</th>
						<th>Stock</th>						
						<th>Estatus</th>
						
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
					<td><?= utf8_encode($almacen["nombre_producto"]) ?></td>
					<td><?= $almacen["precio"] ?></td>
					
					<td width="12%" align="center">
						<button type="button" class="btn btn-success btn-sm" title="Producto Vendido" data-toggle="modal" data-target="#modal-almacen<?=$almacen["id_producto"];?>"><i class="fa fa-money fa-lg"></i></button>
					</td>
					<td><?= $almacen["stock"] ?></td>
					<td width="15%"><?php if($almacen["status"]==1): echo "<b style='color: darkseagreen;'>Activo</b>"; else: echo "<b style='color: orange;'>Inactivo</b>"; endif; ?></td>
					
				</tr>
				<!--Modal de Sumar Ventas almacen-->
				<div id="modal-almacen<?=$almacen["id_producto"];?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
				  <div class="modal-dialog modal-sm">
				    <div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							<h4 class="modal-title">Producto Vendido</h4>
						</div> <!--Header-->
						<div class="modal-body">
							<p style="text-align:center;">Producto Seleccionado "<?=utf8_encode($almacen["nombre_producto"])?>" </p>
						</div> <!--Body-->
				    	<div class="modal-footer">
				        	<button type="button" class="btn btn-success" onclick="vender('<?=$almacen["id_producto"];?>')" data-dismiss="modal">VENDIDO</button>
				        	<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				      	</div> <!--Footer-->
				    </div> <!--Content-->
				  </div>
				</div>
				<?php
					$i++;
				}
			}
			else{
				?>
				<tr><td colspan="4">No se han encontrado resultados.</td></tr>
				<?php
			}
			?>
			</table>
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