<style>
	.fc-day-header{
		padding: 10px 0px;
		vertical-align: left;
		background: #F2F2F2;
	}
	.fc-unthemed td{
		border-color: #911AA7;
	}
	.fc-unthemed th{
		border-color: #911AA7;
	}
	#fill{
		overflow:hidden;
		background-size: cover;
   		background-position: center;
    	background-image: url('views/img/eleganzzaSilueta.png');
	}
</style>

<div class="container">
	<div class="row">
		<div class="col" id="fill"></div>
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
	var Requerido2;
	var Requerido3;
	var Cancelado;
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
				color: "#A9ECF5",
				textColor: "#700783"
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
					$("#txtEmpleadaEvento2").val(calEvent.empleada2);
					$("#txtEmpleadaEvento3").val(calEvent.empleada3);
					Requerido=$("#txtEmpleadaEvento").val();
					if (Requerido===""||Requerido==="0"){
						$("#ModalEventos").modal();
						$("#tituloEventoE").html(calEvent.title);
						$("#txtTratamientoEvento").val(calEvent.tratamiento);
						$("#txtTratamientoEvento2").val(calEvent.tratamiento2);
						$("#txtTratamientoEvento3").val(calEvent.tratamiento3);
						$("#txtTratamientoEvento4").val(calEvent.tratamiento4);
						$("#txtIDEvento").val(calEvent.idCitas);
						$("#txtHoraEvento").val(FechaHora[1]);
						$("#txtFechaEvento").val(FechaHora[0]);
						$("#txtPacienteEvento").val(calEvent.title);
						$("#txtNotaEvento").val(calEvent.nota);
						document.getElementById("txtEmpleadaEvento").disabled=false;
						document.getElementById("txtEmpleadaEvento2").disabled=false;
						document.getElementById("txtEmpleadaEvento3").disabled=false;
						document.getElementById("btnEliminar").disabled=false;
						document.getElementById("btnModificar").disabled=false;
						document.getElementById("btnCambiar").disabled=false;
						document.getElementById("txtTratamientoEvento").disabled=false;
						document.getElementById("txtTratamientoEvento2").disabled=false;
						document.getElementById("txtTratamientoEvento3").disabled=false;
						document.getElementById("txtTratamientoEvento4").disabled=false;
						document.getElementById("txtHoraEvento").disabled=false;
						document.getElementById("txtNotaEvento").disabled=false;
					} else {
						$("#cancelado").val(calEvent.estado);
						Cancelado="";
						Cancelado=$("#cancelado").val();
						if (Cancelado != ""){
							$("#ModalEventos").modal();
							$("#tituloEventoE").html(calEvent.title+" CITA CANCELADA");
							$("#txtTratamientoEvento").val(calEvent.tratamiento);
							$("#txtTratamientoEvento2").val(calEvent.tratamiento2);
							$("#txtTratamientoEvento3").val(calEvent.tratamiento3);
							$("#txtTratamientoEvento4").val(calEvent.tratamiento4);
							$("#txtIDEvento").val(calEvent.idCitas);
							$("#txtHoraEvento").val(FechaHora[1]);
							$("#txtFechaEvento").val(FechaHora[0]);
							$("#txtPacienteEvento").val(calEvent.title);
							$("#txtNotaEvento").val(calEvent.nota);
							document.getElementById("txtEmpleadaEvento").disabled=true;
							document.getElementById("txtEmpleadaEvento2").disabled=true;
							document.getElementById("txtEmpleadaEvento3").disabled=true;
							document.getElementById("btnEliminar").disabled=true;
							document.getElementById("btnModificar").disabled=true;
							document.getElementById("btnCambiar").disabled=true;
							document.getElementById("txtTratamientoEvento").disabled=true;
							document.getElementById("txtTratamientoEvento2").disabled=true;
							document.getElementById("txtTratamientoEvento3").disabled=true;
							document.getElementById("txtTratamientoEvento4").disabled=true;
							document.getElementById("txtHoraEvento").disabled=true;	
							document.getElementById("txtNotaEvento").disabled=true;			
						} else {
							$("#ModalEventos").modal();
							$("#tituloEventoE").html(calEvent.title+" PACIENTE YA ATENDIDA");
							$("#txtTratamientoEvento").val(calEvent.tratamiento);
							$("#txtTratamientoEvento2").val(calEvent.tratamiento2);
							$("#txtTratamientoEvento3").val(calEvent.tratamiento3);
							$("#txtTratamientoEvento4").val(calEvent.tratamiento4);
							$("#txtIDEvento").val(calEvent.idCitas);
							$("#txtHoraEvento").val(FechaHora[1]);
							$("#txtFechaEvento").val(FechaHora[0]);
							$("#txtPacienteEvento").val(calEvent.title);
							$("#txtNotaEvento").val(calEvent.nota);
							document.getElementById("txtEmpleadaEvento").disabled=true;
							document.getElementById("txtEmpleadaEvento2").disabled=true;
							document.getElementById("txtEmpleadaEvento3").disabled=true;
							document.getElementById("btnEliminar").disabled=true;
							document.getElementById("btnModificar").disabled=true;
							document.getElementById("btnCambiar").disabled=true;
							document.getElementById("txtTratamientoEvento").disabled=true;
							document.getElementById("txtTratamientoEvento2").disabled=true;
							document.getElementById("txtTratamientoEvento3").disabled=true;
							document.getElementById("txtTratamientoEvento4").disabled=true;
							document.getElementById("txtHoraEvento").disabled=true;	
							document.getElementById("txtNotaEvento").disabled=true;	
						}				
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
						InfoEventosM("modificarM",ExisteEvento,true);
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
			swal({
				type: "error",
				title: "Favor de ingresar tu número de empleada",
				showConfirmButton: "true",
				confirmButtonText: "Aceptar",
				closeOnConfirm: "false",
			}). then ((result)=>{
				if (result.value){
				}
			});
		} else {
			RecolectarDatos();
			usuarioagenda("usuarioagenda",NuevoEvento);
		}
	});

	$("#btnEliminar").click(function(){
		Requerido = $("#txtEmpleadaEvento").val();
		if (Requerido === "" || Requerido=== "0"){
			swal({
				type: "error",
				title: "Favor de ingresar tu número de empleada",
				showConfirmButton: "true",
				confirmButtonText: "Aceptar",
				closeOnConfirm: "false",
			}). then ((result)=>{
				if (result.value){
				}
			});
		} else {
			DatosEventos();
			usuarioeliminar("usuarioatendio",ExisteEvento);	
		}
	});

	$("#btnConfirmar").click(function(){
		InfoEventosEliminar("eliminar",ExisteEvento);
	});

	$("#btnModificar").click(function(){
		Requerido = $("#txtEmpleadaEvento").val();
		Requerido2 = $("#txtEmpleadaEvento2").val();
		Requerido3 = $("#txtEmpleadaEvento3").val();
		if (Requerido === "" || Requerido=== "0"){
			swal({
				type: "error",
				title: "Favor de ingresar tu número de empleada",
				showConfirmButton: "true",
				confirmButtonText: "Aceptar",
				closeOnConfirm: "false",
			}). then ((result)=>{
				if (result.value){
				}
			});
		} else {
			DatosEventos();
			if (Requerido3 != "" && Requerido2 != "" && Requerido != ""){
				usuarioatendio3("usuarioatendio3", ExisteEvento);
			} else if (Requerido2 != "" && Requerido != ""){
				usuarioatendio2("usuarioatendio2", ExisteEvento);
			} else if (Requerido != ""){
				usuarioatendio("usuarioatendio", ExisteEvento);
			}
		}
	});

	$("#btnCambiar").click(function(){
		Requerido = $("#txtEmpleadaEvento").val();
		if (Requerido === "" || Requerido === "0"){
			swal({
				type: "error",
				title: "Favor de ingresar tu número de empleada",
				showConfirmButton: "true",
				confirmButtonText: "Aceptar",
				closeOnConfirm: "false",
			}). then ((result)=>{
				if (result.value){	
				}
			});
		} else {
			DatosEventos();
			usuariocambio("usuarioatendio",ExisteEvento);
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
			tratamiento2:$("#txtTratamiento2").val(),
			tratamiento3:$("#txtTratamiento3").val(),
			tratamiento4:$("#txtTratamiento4").val(),
			start:$("#txtFecha").val()+" "+$("#txtHora").val(),
			end:final,
			color: "#A9ECF5",
			textColor: "#700783",
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
			tratamiento2:$("#txtTratamientoEvento2").val(),
			tratamiento3:$("#txtTratamientoEvento3").val(),
			tratamiento4:$("#txtTratamientoEvento4").val(),
			empleada:$("#txtEmpleadaEvento").val(),
			empleada2:$("#txtEmpleadaEvento2").val(),
			empleada3:$("#txtEmpleadaEvento3").val(),
			start:$("#txtFechaEvento").val()+" "+$("#txtHoraEvento").val(),
			end:final,
			color: "#A9ECF5",
			textColor: "#700783",
			nota:$("#txtNotaEvento").val()
		}
	}

	function usuarioagenda(accion, objEvento){
		$.ajax({
			type: "POST",
			url: "views/modules/eventos.php?accion="+accion,
			data: objEvento,
			success: function(msg){
				console.log("msg", msg);
				if (msg === false){
					swal({
						type: "error",
						title: "No Existe Esta Empleada",
						showConfirmButton: "true",
						confirmButtonText: "Aceptar",
						closeOnConfirm: "false",
					}). then ((result)=>{
						if (result.value){
						}
					});
				} else {
					EnviarInformacion("agregar",NuevoEvento);
				}
			},
			error: function(jqXHR, textStatus, errorThrown, exception){
				if (jqXHR.status === 0) {
	                alert('Not connect.\n Verify Network.');
	            } else if (jqXHR.status == 404) {
	                alert('Requested page not found. [404]');
	            } else if (jqXHR.status == 500) {
	                alert('Internal Server Error [500].');
	            } else if (exception === 'parsererror') {
	                alert('Requested JSON parse failed.');
	            } else if (exception === 'timeout') {
	                alert('Time out error.');
	            } else if (exception === 'abort') {
	                alert('Ajax request aborted.');
	            } else {
	                alert('Uncaught Error.\n' + jqXHR.responseText);
	            }
			}
		})
	}

	function usuarioatendio(accion, objEvento){
		$.ajax({
			type: "POST",
			url: "views/modules/eventos.php?accion="+accion,
			data: objEvento,
			success: function(msg){
				console.log("msg", msg);
				if (msg === false){
					swal({
						type: "error",
						title: "No Existe La Empleada #1",
						showConfirmButton: "true",
						confirmButtonText: "Aceptar",
						closeOnConfirm: "false",
					}). then ((result)=>{
						if (result.value){
						}
					});
				} else {
					InfoEventos("modificar",ExisteEvento);
					var cita = $("#txtIDEvento").val();
					var descr =$("#txtTratamientoEvento").val()+" -- "+$("#txtTratamientoEvento2").val()+" -- "+$("#txtTratamientoEvento3").val()+" -- "+$("#txtTratamientoEvento4").val();
					var cliente = $("#txtPacienteEvento").val();
					window.location.href="index.php?action=ventaatendida&cita="+encodeURIComponent(cita)+"&tratamiento="+encodeURIComponent(descr)+"&paciente="+encodeURIComponent(cliente);
				}
			},
			error: function(jqXHR, textStatus, errorThrown, exception){
				if (jqXHR.status === 0) {
	                alert('Not connect.\n Verify Network.');
	            } else if (jqXHR.status == 404) {
	                alert('Requested page not found. [404]');
	            } else if (jqXHR.status == 500) {
	                alert('Internal Server Error [500].');
	            } else if (exception === 'parsererror') {
	                alert('Requested JSON parse failed.');
	            } else if (exception === 'timeout') {
	                alert('Time out error.');
	            } else if (exception === 'abort') {
	                alert('Ajax request aborted.');
	            } else {
	                alert('Uncaught Error.\n' + jqXHR.responseText);
	            }
			}
		})
	}

	function usuarioatendio3(accion, objEvento){
		$.ajax({
			type: "POST",
			url: "views/modules/eventos.php?accion="+accion,
			data: objEvento,
			success: function(msg){
				//console.log("msg", msg);
				if (msg === false){
					swal({
						type: "error",
						title: "No Existe La Empleada #3",
						showConfirmButton: "true",
						confirmButtonText: "Aceptar",
						closeOnConfirm: "false",
					}). then ((result)=>{
						console.log("result", result);
						if (result.value){
						}
					});
				} else {
					usuarioatendio2("usuarioatendio2", ExisteEvento);
				}
			},
			error: function(jqXHR, textStatus, errorThrown, exception){
				if (jqXHR.status === 0) {
	                alert('Not connect.\n Verify Network.');
	            } else if (jqXHR.status == 404) {
	                alert('Requested page not found. [404]');
	            } else if (jqXHR.status == 500) {
	                alert('Internal Server Error [500].');
	            } else if (exception === 'parsererror') {
	                alert('Requested JSON parse failed.');
	            } else if (exception === 'timeout') {
	                alert('Time out error.');
	            } else if (exception === 'abort') {
	                alert('Ajax request aborted.');
	            } else {
	                alert('Uncaught Error.\n' + jqXHR.responseText);
	            }
			}
		})
	}

	function usuarioatendio2(accion, objEvento){
		$.ajax({
			type: "POST",
			url: "views/modules/eventos.php?accion="+accion,
			data: objEvento,
			success: function(msg){
				//console.log("msg", msg);
				if (msg === false){
					swal({
						type: "error",
						title: "No Existe La Empleada #2",
						showConfirmButton: "true",
						confirmButtonText: "Aceptar",
						closeOnConfirm: "false",
					}). then ((result)=>{
						console.log("result", result);
						if (result.value){
						}
					});
				} else {
					usuarioatendio("usuarioatendio",ExisteEvento);
				}
			},
			error: function(jqXHR, textStatus, errorThrown, exception){
				if (jqXHR.status === 0) {
	                alert('Not connect.\n Verify Network.');
	            } else if (jqXHR.status == 404) {
	                alert('Requested page not found. [404]');
	            } else if (jqXHR.status == 500) {
	                alert('Internal Server Error [500].');
	            } else if (exception === 'parsererror') {
	                alert('Requested JSON parse failed.');
	            } else if (exception === 'timeout') {
	                alert('Time out error.');
	            } else if (exception === 'abort') {
	                alert('Ajax request aborted.');
	            } else {
	                alert('Uncaught Error.\n' + jqXHR.responseText);
	            }
			}
		})
	}

	function usuarioeliminar(accion, objEvento){
		$.ajax({
			type: "POST",
			url: "views/modules/eventos.php?accion="+accion,
			data: objEvento,
			success: function(msg){
				console.log("msg", msg);
				if (msg === false){
					swal({
						type: "error",
						title: "No Existe Esta Empleada",
						showConfirmButton: "true",
						confirmButtonText: "Aceptar",
						closeOnConfirm: "false",
					}). then ((result)=>{
						if (result.value){
						}
					});
				} else {
					$("#ModalBorrar").modal();
				}
			},
			error: function(jqXHR, textStatus, errorThrown, exception){
				if (jqXHR.status === 0) {
	                alert('Not connect.\n Verify Network.');
	            } else if (jqXHR.status == 404) {
	                alert('Requested page not found. [404]');
	            } else if (jqXHR.status == 500) {
	                alert('Internal Server Error [500].');
	            } else if (exception === 'parsererror') {
	                alert('Requested JSON parse failed.');
	            } else if (exception === 'timeout') {
	                alert('Time out error.');
	            } else if (exception === 'abort') {
	                alert('Ajax request aborted.');
	            } else {
	                alert('Uncaught Error.\n' + jqXHR.responseText);
	            }
			}
		})
	}

	function usuariocambio(accion, objEvento){
		$.ajax({
			type: "POST",
			url: "views/modules/eventos.php?accion="+accion,
			data: objEvento,
			success: function(msg){
				console.log("msg", msg);
				if (msg === false){
					swal({
						type: "error",
						title: "No Existe Esta Empleada",
						showConfirmButton: "true",
						confirmButtonText: "Aceptar",
						closeOnConfirm: "false",
					}). then ((result)=>{
						if (result.value){
						}
					});
				} else {
					InfoEventosM("modificarM",ExisteEvento,true);
					$("#ModalEventos").modal("toggle");
				}
			},
			error: function(jqXHR, textStatus, errorThrown, exception){
				if (jqXHR.status === 0) {
	                alert('Not connect.\n Verify Network.');
	            } else if (jqXHR.status == 404) {
	                alert('Requested page not found. [404]');
	            } else if (jqXHR.status == 500) {
	                alert('Internal Server Error [500].');
	            } else if (exception === 'parsererror') {
	                alert('Requested JSON parse failed.');
	            } else if (exception === 'timeout') {
	                alert('Time out error.');
	            } else if (exception === 'abort') {
	                alert('Ajax request aborted.');
	            } else {
	                alert('Uncaught Error.\n' + jqXHR.responseText);
	            }
			}
		})
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
					swal({
						type: "success",
						title: "Cita agregada exitosamente",
						showConfirmButton: "true",
						confirmButtonText: "Aceptar",
						closeOnConfirm: "false",
					}). then ((result)=>{
						if (result.value){
							window.location.reload();
						}
					});
				}
			},
			error: function(jqXHR, textStatus, errorThrown, exception){
				if (jqXHR.status === 0) {
	                alert('Not connect.\n Verify Network.');
	            } else if (jqXHR.status == 404) {
	                alert('Requested page not found. [404]');
	            } else if (jqXHR.status == 500) {
	                alert('Internal Server Error [500].');
	            } else if (exception === 'parsererror') {
	                alert('Requested JSON parse failed.');
	            } else if (exception === 'timeout') {
	                alert('Time out error.');
	            } else if (exception === 'abort') {
	                alert('Ajax request aborted.');
	            } else {
	                alert('Uncaught Error.\n' + jqXHR.responseText);
	            }
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
					swal({
						type: "info",
						title: "Cita cancelada exitosamente",
						showConfirmButton: "true",
						confirmButtonText: "Aceptar",
						closeOnConfirm: "false",
					}). then ((result)=>{
						if (result.value){
						}
					});
					if (!modal){
						$("#ModalEventos").modal("toggle");
						$("#ModalBorrar").modal("toggle");
					}
				}
			},
			error: function(jqXHR, textStatus, errorThrown, exception){
				if (jqXHR.status === 0) {
	                alert('Not connect.\n Verify Network.');
	            } else if (jqXHR.status == 404) {
	                alert('Requested page not found. [404]');
	            } else if (jqXHR.status == 500) {
	                alert('Internal Server Error [500].');
	            } else if (exception === 'parsererror') {
	                alert('Requested JSON parse failed.');
	            } else if (exception === 'timeout') {
	                alert('Time out error.');
	            } else if (exception === 'abort') {
	                alert('Ajax request aborted.');
	            } else {
	                alert('Uncaught Error.\n' + jqXHR.responseText);
	            }
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
			}
		});
	}

	function InfoEventosM(accion,objEvento,modal){
		$.ajax({
			type:"POST",
			url:"views/modules/eventos.php?accion="+accion,
			data:objEvento,
			success: function(msg){
			if(msg){
				$("#calendario").fullCalendar("refetchEvents");
				swal({
					type: "success",
					title: "Cita modificada exitosamente",
					showConfirmButton: "true",
					confirmButtonText: "Aceptar",
					closeOnConfirm: "false",
				}). then ((result)=>{
					if (result.value){
					}
				});
				if (!modal){
					$("#ModalEventos").modal("toggle");
				}
			}
		},
		error: function(jqXHR, textStatus, errorThrown, exception){
				if (jqXHR.status === 0) {
	                alert('Not connect.\n Verify Network.');
	            } else if (jqXHR.status == 404) {
	                alert('Requested page not found. [404]');
	            } else if (jqXHR.status == 500) {
	                alert('Internal Server Error [500].');
	            } else if (exception === 'parsererror') {
	                alert('Requested JSON parse failed.');
	            } else if (exception === 'timeout') {
	                alert('Time out error.');
	            } else if (exception === 'abort') {
	                alert('Ajax request aborted.');
	            } else {
	                alert('Uncaught Error.\n' + jqXHR.responseText);
	            }
			}
		});
	}

	function limpieza(){
		$("#txtID").val("");
		$("#txtPaciente").val("");
		$("#txtTratamiento").val("");
		$("#txtTratamiento2").val("");
		$("#txtTratamiento3").val("");
		$("#txtTratamiento4").val("");
		$("#agendo").val("");
		$("#referida").val("");
	}

	$(".clockpicker").clockpicker();


</script>