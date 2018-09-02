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
<?php include "modalBorrar.php"; ?>
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
				if (moment().format("YYYY-MM-DD")===date.format("YYYY-MM-DD") || date.isAfter(moment())){
					limpieza();
					$("#ModalCitas").modal();
					$("#txtFecha").val(date.format());
				}
			},

			eventClick:function(calEvent,jsEvent,view){
				FechaHora=calEvent.start._i.split(" ");
				Requerido="";
				if (FechaHora[0]>=moment().format("YYYY-MM-DD")){
					$("#txtEmpleadaEvento").val(calEvent.empleada);
					Requerido=$("#txtEmpleadaEvento").val();
					if (Requerido===""||Requerido==="0"){
						$("#ModalEventos").modal();
						$("#tituloEventoE").html(calEvent.title);
						$("#txtTratamientoEvento").val(calEvent.tratamiento);
						$("#txtIDEvento").val(calEvent.idCitas);
						$("#txtHoraEvento").val(FechaHora[1]);
						$("#txtFechaEvento").val(FechaHora[0]);
						$("#txtPacienteEvento").val(calEvent.title);
						$("#txtNotaEvento").val(calEvent.nota);
						document.getElementById("txtEmpleadaEvento").disabled=false;
						document.getElementById("btnEliminar").disabled=false;
						document.getElementById("btnModificar").disabled=false;
						document.getElementById("txtTratamientoEvento").disabled=false;
						document.getElementById("txtHoraEvento").disabled=false;
						document.getElementById("txtNotaEvento").disabled=false;
					} else {
						$("#ModalEventos").modal();
						$("#tituloEventoE").html(calEvent.title+" PACIENTE YA ATENDIDA");
						$("#txtTratamientoEvento").val(calEvent.tratamiento);
						$("#txtIDEvento").val(calEvent.idCitas);
						$("#txtHoraEvento").val(FechaHora[1]);
						$("#txtFechaEvento").val(FechaHora[0]);
						$("#txtPacienteEvento").val(calEvent.title);
						$("#txtNotaEvento").val(calEvent.nota);
						document.getElementById("txtEmpleadaEvento").disabled=true;
						document.getElementById("btnEliminar").disabled=true;
						document.getElementById("btnModificar").disabled=true;
						document.getElementById("txtTratamientoEvento").disabled=true;
						document.getElementById("txtHoraEvento").disabled=true;	
						document.getElementById("txtNotaEvento").disabled=true;					
					}
				}
			},

			eventDrop:function(calEvent,delta,revertFunc){
				Requerido="";
				FechaHora=calEvent.start.format().split("T");
				if (FechaHora[0]>=moment().format("YYYY-MM-DD")){
					$("#txtEmpleadaEvento").val(calEvent.empleada);
					Requerido=$("#txtEmpleadaEvento").val();
					if (Requerido==="" || Requerido==="0"){
						$("#txtIDEvento").val(calEvent.idCitas);
						$("#txtPacienteEvento").val(calEvent.title);
						$("#txtTratamientoEvento").val(calEvent.tratamiento);
						$("#txtEmpleadaEvento").val(calEvent.empleada);
						//var fechaEvento = calEvent.start.format().split("T");
						$("#txtFechaEvento").val(FechaHora[0]);
						$("#txtHoraEvento").val(FechaHora[1]);
						DatosEventos();
						InfoEventos("modificarM",ExisteEvento,true);
					} else {
						revertFunc();
					}
				} else {
					revertFunc();
				}
			}
		});
	});

	$("#btnAgregar").click(function(){
		Requerido = $("#agendo").val();
		if (Requerido === ""){
			alert ("Ingresa tu numero de empleada");
		} else {
			RecolectarDatos();
			EnviarInformacion("agregar",NuevoEvento);
		}
	});

	$("#btnEliminar").click(function(){
		Requerido = $("#txtEmpleadaEvento").val();
		if (Requerido === "" || Requerido=== "0"){
			alert ("Ingresa tu numero de Empleada");
		} else {	
			$("#ModalBorrar").modal();
		}
	});

	$("#btnConfirmar").click(function(){
		DatosEventos();
		InfoEventosEliminar("eliminar",ExisteEvento);
	});

	$("#btnModificar").click(function(){
		Requerido = $("#txtEmpleadaEvento").val();
		if (Requerido === "" || Requerido=== "0"){
			alert ("Ingresa tu numero de empleada");
		} else {
			DatosEventos();
			InfoEventos("modificar",ExisteEvento);
			var cita = $("#txtIDEvento").val();
			var descr =$("#txtTratamientoEvento").val();
			var cliente = $("#txtPacienteEvento").val();
			window.location.href="index.php?action=ventaatendida&cita="+encodeURIComponent(cita)+"&tratamiento="+encodeURIComponent(descr)+"&paciente="+encodeURIComponent(cliente);
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
			textColor: "#6B1B9D",
			agendo:$("#agendo").val(),
			referida:$("#referida").val(),
			ultimacita:$("#ultimacita").val()
		};
	}

	function DatosEventos(){
		horainicio=$("#txtFechaEvento").val()+" "+$("#txtHoraEvento").val()+":00";
		horaend = moment(horainicio,"YYYY-MM-DD HH:mm:ss");
		horaend.add(45,'minutes');
		var final = horaend.format("YYYY-MM-DD HH:mm:ss");
		ExisteEvento = {
			idCitas:$("#txtIDEvento").val(),
			title:$("#txtPacienteEvento").val(),
			tratamiento:$("#txtTratamientoEvento").val(),
			empleada:$("#txtEmpleadaEvento").val(),
			start:$("#txtFechaEvento").val()+" "+$("#txtHoraEvento").val(),
			end:final,
			color: "#1BC1D7",
			textColor: "#6B1B9D",
			nota:$("#txtNotaEvento").val()
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

	function InfoEventosEliminar(accion,objEvento,modal){
		$.ajax({
			type:"POST",
			url:"views/modules/eventos.php?accion="+accion,
			data:objEvento,
			success: function(msg){
			if(msg){
				$("#calendario").fullCalendar("refetchEvents");
				if (!modal){
					$("#ModalEventos").modal("toggle");
					$("#ModalBorrar").modal("toggle");
				}
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
		$("#agendo").val("");
		$("#referida").val("");
	}

	$(".clockpicker").clockpicker();


</script>