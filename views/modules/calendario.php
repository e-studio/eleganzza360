<div class="container">
	<div class="row">
		<div class="col"></div> 
		<div class="col-7"><br><div id="calendario"></div></div>
		<div class="col"></div>
	</div>
</div>

<script>

	$(document).ready(function(){
		$('#calendario').fullCalendar({

			eventLimit: 3,
			hiddenDays: [7],

			minTime: "08:00",
			maxTime: "19:00",

			footer:{
				left:'today,prev,next',
				center:'title',
				right:'month, listDay,listWeek, agendaWeek'
			},

			buttonText:{
				listWeek: "Lista Semanal",
				listDay: "lista Diaria",
				today: moment().format("DD/MMMM"),
			},

			header: false,

			dayClick:function(date,jsEvent,view){

				$('#btnAgregar').prop("disabled", false);
				$('#btnEliminar').prop("disabled", true);
				$('#btnModificar').prop("disabled", true);
				$('#txtDescripcion').prop("disabled", false);

				LimpiarFormulario();

				$('#txtFecha').val(date.format());

				$("#ModalEventos").modal('show');

				$('#empleada').css('visibility','hidden');

			},

			events: 'http://localhost:8080/eleganzza360/views/modules/eventos.php',

			eventClick: function(calEvent,jsEvent,view){

				$("#ModalEventos").modal();
				$('#btnAgregar').prop("disabled", true);
				$('#btnEliminar').prop("disabled", false);
				$('#btnModificar').prop("disabled", false);
				$('#tituloEvento').html(calEvent.idPaciente);
				$('#txtTratamiento').val(calEvent.idTratamiento);
				$('#txtTratamiento').prop("disabled", true);
				$('#txtID').val(calEvent.idCitas);
				$('#txtPaciente').val(calEvent.idPaciente);
				$('#txtColor').val(calEvent.colorTexto);
				FechaHora = calEvent.fechaInicio._i.split(" ");
				$('#txtFecha').val(FechaHora [0]);
				$('#txtHora').val(FechaHora [1]);
				$('#txtHora').prop("visible", false);
				$('#empleada').css('visibility','visible');
				$('#empleada').val("");				

			},

			editable:true,

			eventDrop: function(calEvent){

				$('#txtID').val(calEvent.idCitas);
				$('#txtPaciente').val(calEvent.idPaciente);
				$('#txtColor').val(calEvent.colorTexto);
				$('#txtTratamiento').val(calEvent.idTratamiento);
				var fechaHora = calEvent.fechaInicio.format().split(" ");
				$('#txtFecha').val(fechaHora[0]);
				$('#txtHora').val(fechaHora[1]);
				RecolectarDatosGUI();
				EnviarInformacion('modificar',NuevoEvento,true);

			}
		});
	});

</script>

<?php include "modal.php" ?>

<script>

	var NuevoEvento;
	var Requerido;
	$('#btnAgregar').click(function(){
		RecolectarDatosGUI();
		EnviarInformacion('agregar',NuevoEvento);
	});

	$('#btnEliminar').click(function(){
		Requerido = $('#empleada').val();
		if(Requerido === ""){
			alert ("Ingresa el Numero de Empleada:");
		}
		else {
			RecolectarDatosGUI();
			EnviarInformacion('eliminar',NuevoEvento);
		}
	});

	$('#btnModificar').click(function(){
		Requerido = $('#empleada').val();
		if (Requerido === ""){
			alert ("Ingresa el Numero de Empleada:");
		}
		else {
			RecolectarDatosGUI();
			EnviarInformacion('modificar',NuevoEvento);
		}
	});

	function RecolectarDatosGUI(){
		NuevoEvento= {
			idCitas:$('#txtID').val(),
			idPaciente:$('#txtPaciente').val(),
			fechaInicio:$('#txtFecha').val()+" "+$('#txtHora').val(),
			color:"#FF22FF",
			idTratamiento:$('#txtTratamiento').val(),
			colorTexto:"#FFFFFF",
			fechaFin:$('#txtFecha').val()+" "+$('#txtHora').val(),
			idEmpleada:$('#empleada').val()
		};
	}

	function EnviarInformacion(accion,objEvento,modal){ //modal es para saber si esta activo el modal
		$.ajax({
			type: 'POST',
			url: 'views/modules/eventos.php?accion='+ accion,
			data: objEvento,
			success:function(msg){
				if(msg){
					$('#calendario').fullCalendar('refetchEvents');
					if(!modal){
						$('#ModalEventos').modal('toggle');
					}
				}
			},
			error:function(){
				alert("Hay un error ....");
			}
		});
	}

	$('.clockpicker').clockpicker();

	function LimpiarFormulario(){
		$('#txtID').val('');
		$('#txtPaciente').val('');
		$('#txtTratamiento').val('');
	}
</script>