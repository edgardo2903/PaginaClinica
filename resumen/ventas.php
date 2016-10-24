<?
if(file_exists("../funcionesphp/seguridad.php"))
	include("../funcionesphp/seguridad.php");
else
	include("funcionesphp/seguridad.php");
antiChismoso();
/*	ESTE PROGRAMA ES PARA ADMINISTRAR ALMACEN INVENTARIOS PRECIOS ...
	CHULETA PARA LOS INPUTS: 

input_hidden("$id","$value");
input_text("$label","$id","$ancho","$tipo","$onclick","$onblur","$attr");
input_textarea("$label","$id","$ancho","$onclick","$onblur","$attr");
input_numero("$label","$id","$ancho","$onclick","$onblur","$attr");
input_monto("$label","$id","$ancho","$onclick","$onblur","$attr");
input_fecha("$label","$id","$ancho",$fecha,"$onclick","$onblur","$attr");
select("$label","$id","$ancho","$onchange","$tabla","$where","$idvalue","$campotexto","$onclick","$onblur","$attr","$options");
input_check("$label","$id","$ancho","$value","$onclick","$onchange","$onblur","$attr")

*/
?>

<div class="container" style="padding-top:0px;">		
	<div class="panel panel-default" style="box-shadow:2px 2px 5px;margin:0 auto;width:100%;">
		<div class="panel-heading" style="text-align: center;font-size: 25px;padding: 20px;">Resumen de Ventas </div>
			<div class="panel-body">
			
				<div class="form-group" style="text-align:center;margin-top:15px;">
				    <button type="button" class="btn btn-info" onclick="reporte(1)">Reporte de Hoy</button>
				  <!--  <button type="button" class="btn btn-success" onclick="reporte(2)">Ultima Semana</button>-->
				    <button type="button" class="btn btn-primary" onclick="filtros_mes()">Reporte Por Mes</button>

				    <div id="avz" style="margin: 15px;"><button type="button"class="btn btn-success" onclick="mostrar_filtros()"><i class="fa fa-search"></i> Avanzada</button><div id="search" style="float: left; width:50%;display: block;"></div></div>
					    <div id="filtros" style="display: none;">
					    <br> <br>
							<?=input_fecha("<b>Fecha Desde:</b>","fechad","","","$onclick","$onblur","$attr");?>
							<?=input_fecha("<b>Fecha Hasta:</b>","fechah","","","$onclick","$onblur","$attr");?>
							<div class="form-group" style="text-align:center;margin-top:15px;">
						   		<button type="button" class="btn btn-success" onclick="reporte(3)">Buscar</button>
						   		<button type="button" class="btn btn-default" onclick="limpiar_filtros()">Limpiar</button>
				   			</div>
				   		</div>
				   		<div id="filtros_mes" style="display: none;">
				   		<br> <br>
							<?=select("<b>seleccione el Mes</b>","mes","$ancho","reporte(2)","meses","","numero","mes","$onclick","$onblur","$attr","");?>
				   		</div>
					</div>
				</div>
				<div id="divDatos" style="margin:0 auto;"></div>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">

$('#produc').on('keyup',function(){ // Para Realizar la busqueda de Productos
		var dato = $('#produc').val();
		var accion="consultar2";
		$("#divDatos").load("vender/vender_data.php",{accion:accion,dato:dato},function()
		{
			$("#pag"+num).addClass("active");
			setTimeout($.unblockUI); 
		});
		
	});

function reporte(tipo){
	if (tipo==1) {
		$.get("resumen/ventas_data.php",{tipo:tipo},function(response){
			//json = eval('('+response+')');
			$("#divDatos").html(response);
			//crear_modal("Información",json.msg,"info","","limpiar_form()","");
		});
		$("#filtros_mes").css("display","none");
		$("#filtros").css("display","none");
	}
	else if (tipo==2){
		var mes = $('#mes').val();
		$.get("resumen/ventas_data.php",{tipo:tipo,mes:mes},function(response){
			//json = eval('('+response+')');
			$("#divDatos").html(response);
			//crear_modal("Información",json.msg,"info","","limpiar_form()","");
		});
	}
	else if (tipo==3){
		var fechad = $('#fechad').val();
		var fechah = $('#fechah').val();
		$.get("resumen/ventas_data.php",{tipo:tipo,fechad:fechad,fechah:fechah},function(response){
			//json = eval('('+response+')');
			$("#divDatos").html(response);
			//crear_modal("Información",json.msg,"info","","limpiar_form()","");
		});
	}
}

function pag(num)
{
	var accion="consultar";
	var pg=num;


	$.blockUI({ css: { 
	    border: 'none', 
	    padding: '15px', 
	    backgroundColor: '#000', 
	    '-webkit-border-radius': '10px', 
	    '-moz-border-radius': '10px', 
	    opacity: .5, 
	    color: '#fff' 
	} });

	$("#divDatos").load("resumen/ventas_data.php",{accion:accion,pg:pg},function()
		{
			$("#pag"+num).addClass("active");
			setTimeout($.unblockUI); 
		});
}

function guardar(){
	if($("#nombre").val()==""){
		crear_dialog("Error","Debe llenar el campo nombre.","nombre");
		return false;
	}
	if($("#accion").val()==""){
		$("#accion").val("guardar");
	}
	$.get("vender/vender_data.php",$("#form1").serialize(),function(response){
		json = eval('('+response+')');
		crear_modal("Información",json.msg,"info","","","");
		if(json.result==true){
			limpiar_form();
		}
	});
}

function eliminar(id){
	$.get("inventario/almacen_data.php",{accion:"eliminar",idalmacen:id},function(response){
		json = eval('('+response+')');
		crear_modal("Información",json.msg,"info","","limpiar_form()","");
	});
}

function mostrar_filtros(){
	display = $("#filtros").css("display");
	if(display=="none"){
		$("#filtros").css("display","inline");
		$("#filtros_mes").css("display","none");
		$("#search").css("display","none");
		$("#avanz").val(1);
		$("#divDatos").html("<b></b>");

	}else{
		$("#filtros").css("display","none");
		$("#search").css("display","inline");
	}
}
function filtros_mes(){
	display = $("#filtros_mes").css("display");
	if(display=="none"){
		$("#filtros_mes").css("display","inline");
		$("#divDatos").html("<b></b>");
		$("#filtros").css("display","none");
		

	}else{
		$("#filtros_mes").css("display","none");
		$("#avz").css("display","inline");
		//$("#search").css("display","inline");
	}
}

function consultar(){
	avanz     = $("#avanz").val();
	
	filnombre = $("#filnombre").val();
	filestatus = $("#filestatus").val();
	filresponsable = $("#filresponsable").val();
	$.get("vender/vender_data.php",{accion:"consultar",avanz:avanz,filnombre:filnombre,filestatus:filestatus,filresponsable:filresponsable},function(response){
		$("#divDatos").html(response);
	});
}

function modAlmacen(idproducto,nombre,descripcion,estatus,precio,iduser,nombreresponsable){
	$("#idproducto").val(idproducto);
	$("#nombre").val(nombre);
	//$("#costo").val(precio);
	$("#descripcion").val(descripcion);
	if(estatus==1){
		$("#estatus").prop( "checked", true );
	}else{
		$("#estatus").prop( "checked", false );
	}
	$("#responsable").val(iduser);
	$(".filter-option").html(nombreresponsable);
	$("#accion").val("modificar");



}

function limpiar_form(){
	$("#idproducto").val("");
	$("#nombre").val("");
	$("#costo").val("");
	$("#cantidad").val("");
	$("#factura").val("");
	$("#descripcion").val("");
	$("#estatus").prop( "checked", false );
	$(".filter-option").empty();
	$("#accion").val("");
	consultar()
}

function limpiar_filtros(){
	$("#fechah").val("");
	$("#fechad").val("");
	
	//consultar()
}

//consultar();
</script>