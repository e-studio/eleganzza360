<style>
	.fc-day-header{
		padding: 10px 0px;
		vertical-align: left;
		background: #F2F2F2;
	}
</style>

<div class="container">
	<div class="row">
		<div class="col"></div>
		<div class="col-8"><div id="calendario"></div></div>
		<div class="col"></div>
	</div>
</div>
<?php include "modalCita.php"; ?>
<?php include "modalEvento.php"; ?>
<script>
	var NuevoEvento;
	var ExisteEvento;
	var Requerido;
	var horaend;
	var horainicio;

	$(document).ready(function(){
		$("#calendario").fullCalendar({

			eventLimit: 2,
			hiddenDays: [ 0 ],
			editable: true,
			minTime: "08:00",
			maxTime: "19:00",
			slotDuration: "00:15:00",
			displayEventEnd: true,

			eventSources:[
			{
				url: "views/modules/eventos.php",
				color: "#1BC1D7",
				textColor: "#6B1B9D"
			}
			],

			header: false,

			footer:{
				left:"today,prev,next",
				center:"title",
				right:"month, listDay,listWeek, agendaWeek"
			},

			buttonText:{
				listWeek:"Agenda Semanal",
				listDay:"Agenda Diaria",
				today:moment().format("DD/MMMM")
			},

			dayClick:function(date,jsEvent,view){
				limpieza();
				$("#ModalCitas").modal();
				$("#txtFecha").val(date.format());
			},

			eventClick:function(calEvent,jsEvent,view){
				$("#ModalEventos").modal();
				$("#tituloEventoE").html(calEvent.title);
				$("#txtTratamientoEvento").val(calEvent.tratamiento);
				$("#txtIDEvento").val(calEvent.idCitas);
				FechaHora=calEvent.start._i.split(" ");
				$("#txtHoraEvento").val(FechaHora[1]);
				$("#txtFechaEvento").val(FechaHora[0]);
				$("#txtPacienteEvento").val(calEvent.title);
				$("#txtEmpleadaEvento").val(calEvent.empleada);
			},

			eventDrop:function(calEvent){
				$("#txtIDEvento").val(calEvent.idCitas);
				$("#txtPacienteEvento").val(calEvent.title);
				$("#txtTratamientoEvento").val(calEvent.tratamiento);
				$("#txtEmpleadaEvento").val(calEvent.empleada);
				var fechaEvento = calEvent.start.format().split("T");
				$("#txtFechaEvento").val(fechaEvento[0]);
				$("#txtHoraEvento").val(fechaEvento[1]);
				DatosEventos();
				InfoEventos("modificar",ExisteEvento,true);
			}

		});
	});

	$("#btnAgregar").click(function(){
		RecolectarDatos();
		EnviarInformacion("agregar",NuevoEvento);
	});

	$("#btnEliminar").click(function(){
		Requerido = $("#txtEmpleadaEvento").val();
		if (Requerido === ""){
			alert ("Ingresa tu numero de Empleada");
		} else {	
			DatosEventos();
			InfoEventos("eliminar",ExisteEvento);
		}
	});

	$("#btnModificar").click(function(){
		Requerido = $("#txtEmpleadaEvento").val();
		if (Requerido === ""){
			alert ("Ingresa tu numero de empleada");
		} else {
			DatosEventos();
			InfoEventos("modificar",ExisteEvento);
		}
	});

	function RecolectarDatos(){
		horainicio=$("#txtFecha").val()+" "+$("#txtHora").val()+":00";
		horaend = moment(horainicio,"YYYY-MM-DD HH:mm:ss");
		horaend.add(45,'minutes');
		var final = horaend.format("YYYY-MM-DD HH:mm:ss");
		
		NuevoEvento = {
			idCitas:$("#txtID").val(),
			title:$("#txtPaciente").val(),
			tratamiento:$("#txtTratamiento").val(),
			start:$("#txtFecha").val()+" "+$("#txtHora").val(),
			end:final,
			color: "#1BC1D7",
			textColor: "#6B1B9D"
		};
	}

	function DatosEventos(){
		ExisteEvento = {
			idCitas:$("#txtIDEvento").val(),
			title:$("#txtPacienteEvento").val(),
			tratamiento:$("#txtTratamientoEvento").val(),
			empleada:$("#txtEmpleadaEvento").val(),
			start:$("#txtFechaEvento").val()+" "+$("#txtHoraEvento").val(),
			end:$("#txtFechaEvento").val()+" "+$("#txtHoraEvento").val(),
			color: "#1BC1D7",
			textColor: "#6B1B9D"
		}
	}

	function EnviarInformacion(accion,objEvento){
		$.ajax({
			type:"POST",
			url:"views/modules/eventos.php?accion="+accion,
			data:objEvento,
			success: function(msg){
				if(msg){
					$("#calendario").fullCalendar("refetchEvents");
					$("#ModalCitas").modal("toggle");
				}
			},
			error: function(){
				alert ("hay un error...");
			}
		});
	}

	function InfoEventos(accion,objEvento,modal){
		$.ajax({
			type:"POST",
			url:"views/modules/eventos.php?accion="+accion,
			data:objEvento,
			success: function(msg){
			if(msg){
				$("#calendario").fullCalendar("refetchEvents");
				if (!modal){
					$("#ModalEventos").modal("toggle");
				}
			}
		},
		error: function(){
			alert ("hay un error...");
		}
		});
	}

	function limpieza(){
		$("#txtID").val("");
		$("#txtPaciente").val("");
		$("#txtTratamiento").val("");
	}

	$(".clockpicker").clockpicker();


</script>