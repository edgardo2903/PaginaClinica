<?php include('necesario/vertical.php'); ?>
<div class="clo-lg-6" style="margin-left:20%;">
	<br>

	<div class="container" style="padding-top:0px;">		
		<div class="panel panel-default" style="box-shadow:2px 2px 5px;margin:0 auto;width:100%;">
			<div class="" style="text-align: center;font-size: 25px;padding: 20px;">Gestionar Citas -- <?php echo ($_REQUEST["cita"]); ?></div>
				<div class="panel-body" id="panelcitas">
					<?=input_hidden("id_cita","")?>
					<div style="float: left; width:50%;"><?=input_numero("Cédula","cedula","$ancho","$onclick","$onblur","$attr");?></div>
					<div style="float: left; width:50%;"><?=input_text("Nombre","nombre","5","","","","");?></div><br><br><br><br>
					<div style="float: left; width:50%;"><?=input_text("Apellido","apellido","5","","","","");?></div>
					<div style="float: left; width:50%;"><?=input_numero("edad","edad","$ancho","$onclick","$onblur","$attr");?></div><br><br><br><br>
					<div style="float: left; width:50%;"><?=input_check("Primera Vez","vez","$ancho","1","$onclick","$onchange","$onblur","$attr","$class");?></div>
					<div style="float: left; width:50%;"><?=input_numero("Teléfono","telefono","$ancho","$onclick","$onblur","$attr");?></div><br><br><br><br>
					<div style="float: left; width:50%;"><?=input_text("Correo Electrónico","correo","5","","","","");?></div>
					<div style="float: left; width:50%;"><?=input_check("Deseo recibir La Conformación por Correo","enviar","$ancho","1","$onclick","$onchange","$onblur","$attr","$class");?></div><br><br><br><br>
					<div style="float: left; width:50%;"><?=select("Especialidad:","especialidad","$ancho","$onchange","especialidades","","id_especialidad","especialidad","$onclick","$onblur","$attr","");?></div>
					<div style="float: left; width:50%;"><?=select("Doctor Especialista:","doctor","$ancho","$onchange","doctores","","id_doctor","doctor","$onclick","$onblur","$attr","");?></div><br><br><br><br>
					<div style="float: left; width:50%;"><?=select("Turno de la Consulta:","turno","$ancho","$onchange","turnos","","id_turno","turno","$onclick","$onblur","$attr","");?></div>

					<div style="float: left; width:50%;"><?=select("Día de la Cita:","dia","$ancho","$onchange","dias","","id_dia","dia","$onclick","$onblur","$attr","");?></div><br><br><br>

					<br><br><br>
					<div class="form-group" style="text-align:center;margin-top:15px;">
					    <button type="button" class="btn btn-success" onclick="solicitar()">Finalizar Solicitud</button>
					    <button type="button" id="cancelar" class="btn btn-primary" onclick="cancelar()">Cancelar</button>
					    <button type="button" id="volver" class="btn btn-warning" style="display:none;" onclick="cancelar()">Volver</button>
					    <a name="cit" "></a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<br>
	<div id="divDatos" style="margin:0 auto;"></div>


</div>




<script type="text/javascript">

function solicitar(){
	if($("#cedula").val()==""){
		crear_dialog("Error","Debe llenar el campo Cédula.","cedula");
		return false;
	}
	if($("#nombre").val()==""){
		crear_dialog("Error","Debe llenar el campo Nombre.","nombre");
		return false;
	}
	if($("#apellido").val()==""){
		crear_dialog("Error","Debe llenar el campo Apellido.","apellido");
		return false;
	}
	if($("#edad").val()==""){
		crear_dialog("Error","Debe llenar el campo Edad.","edad");
		return false;
	}
	
	if($("#telefono").val()==""){
		crear_dialog("Error","Debe llenar el campo Teléfono.","telefono");
		return false;
	}
	if($("#especialidad").val()==""){
		crear_dialog("Error","Debe Seleccionar una Especialidad.","especialidad");
		return false;
	}
	if($("#doctor").val()==""){
		crear_dialog("Error","Debe Seleccionar un Doctor Especialista.","doctor");
		return false;
	}
	if($("#turno").val()=="" || $("#dia").val()==""){
		crear_dialog("Error","Debe Seleccionar un Turno y Un Día Para su Cita.","doctor");
		return false;
	}
	if($("#accion").val()==""){
		$("#accion").val("solicitar");
	}
	$.get("citas/citas_date.php",$("#form1").serialize(),function(response){
		json = eval('('+response+')');
		crear_modal("Información",json.msg,"info","","","");
		if(json.result==true){
			cancelar();
		}
	});
}

function cancelar(){
	$("#id_cita").val("");
	$("#nombre").val("");
	$("#apellido").val("");
	$("#cedula").val("");
	$("#edad").val("");
	$("#correo").val("");
	$("#telefono").val("");
	$("#especialidad").val("");
	$("#doctor").val("");
	$("#turno").val("");
	$("#turno").val("");
	$("#enviar").prop( "checked", false );
	$("#vez").prop( "checked", false );
	$(".filter-option").empty();
	$("#accion").val("");
	volver()
}

function volver(){
	$('#volver').css('display','inline-block');
}
</script>