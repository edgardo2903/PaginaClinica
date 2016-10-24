<?
if(file_exists("../funcionesphp/seguridad.php"))
   include("../funcionesphp/seguridad.php");
else
   include("funcionesphp/seguridad.php");
antiChismoso();
/* 
   CHULETA PARA LOS INPUTS: 

input_hidden("$id","$value");
label("$label","$ancho","$contenido");
input_text("$label","$id","$ancho",$tipo,"$onclick","$onblur","$attr","$type","$ancholabel");
input_textarea("$label","$id","$ancho","$onclick","$onblur","$attr","$height");
input_numero("$label","$id","$ancho","$onclick","$onblur","$attr");
input_monto("$label","$id","$ancho","$onclick","$onblur","$attr");
input_fecha("$label","$id","$ancho","$fecha","$onclick","$onblur","$attr");
select("$label","$id","$ancho","$onchange","$tabla","$where","$idvalue","$campotexto","$onclick","$onblur","$attr","$options","$selected","$class","$ancholabel");
input_check("$label","$id","$ancho","$value","$onclick","$onchange","$onblur","$attr","$class")

*/
?>
<div class="container" style="padding-top:0px;">      
      <div class="panel panel-default" style="box-shadow:2px 2px 5px;margin:0 auto;width:100%;">
         <div class="panel-heading" style="text-align: center;font-size: 25px;padding: 20px;">Respaldar</div>
         <div class="panel-body">

            <div class="form-group" style="text-align:center;margin-top:15px;">
                <a href="respaldo/respaldo_data.php" onclick="info()" class="btn btn-success" >Respaldar Base de Datos</button></a>
            </div>
         </div>
      </div>
</div>
<div id="divDatos" style="margin:0 auto;"></div>

<script type="text/javascript">
function info(){

/*
   crear_modal("titulo","mensaje","tipo","idfocus","funcioncerrar","funcionboton")*/
   crear_dialog("Recuerda","Recuerda guardar en un pendrive el archivo que se ha descargado para mayor segurida de la informau¿ción","idfocus","funcioncerrar","funcionboton")
}
</script>

