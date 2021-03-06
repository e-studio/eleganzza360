<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="E-studio" />



	<!-- Bootstrap core CSS-->
	  <link href="views/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	  <link href="views/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	  <link href="views/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
	  <link href="views/css/sb-admin.css" rel="stylesheet">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="views/css/fullcalendar.css">
    <link rel="stylesheet" href="views/css/fullcalendar.print.css" media="print">
    <link rel="stylesheet" href="views/css/bootstrap-clockpicker.css">

    <script src="views/vendor/jquery/jquery.min.js"></script>
    <script src="views/js/moment.min.js"></script>
    <script src="views/js/jquery-ui.min.js"></script>
    <script src="views/js/fullcalendar.js"></script>
    <script src="views/js/es.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="views/js/bootstrap-clockpicker.js"></script>
    <script src="views/js/sweetalert2.all.js"></script>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/css/select2.min.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
    <link href="views/css/style.css" rel="stylesheet"/>
    <script type="text/javascript" src="views/js/VentanaCentrada.js"></script>
    <script type="text/javascript">
      function Confirmation() {

        if (confirm('Esta seguro que desea borrar ?')==true) {
            alert('Borrado Correctamente');
            //window.location.href='index.php?action=inicio';
            return true;
        }else{
            //alert('Cancelo la eliminacion');
            return false;
        }
      }
    </script>

	<title>Panel de Control</title>

</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">


 	<?php

		$modulos = new Enlaces();
		$modulos -> enlacesController();
		//include "views/modules/footer.php"
	?>

    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirme por favor</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Seleccione "Salir" abajo para cerrar la sesion actual.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="views/modules/salir.php">Salir</a>
          </div>
        </div>
      </div>
    </div>


    <!--Actualiza Modal-->
    <div class="modal fade" id="actualizaModal" tabindex="-1" role="dialog" aria-labelledby="actualizaModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                 <h5 class="modal-title" id="actualizaModalLabel">Cliente Actualizado Exitosamente!</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">Seleccione "Salir" abajo para cerrar la sesion actual.</div>
                <div class="modal-footer">

                  <a class="btn btn-primary" href="index.php?action=clientes">Cerrar</a>
                </div>
              </div>
            </div>
          </div>




    <!--  <script src="views/vendor/jquery/jquery.min.js"></script>  -->
    <script src="views/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="views/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="views/vendor/chart.js/Chart.min.js"></script>
    <script src="views/vendor/datatables/jquery.dataTables.js"></script>
    <script src="views/vendor/datatables/dataTables.bootstrap4.js"></script>
    <script src="views/js/sb-admin.min.js"></script>
    <script src="views/js/sb-admin-datatables.min.js"></script>
<!--    <script src="views/js/sb-admin-charts.min.js"></script>
-->    <script src="views/js/validarIngreso.js"></script>

    <?php
      $grafica = new MvcController();
      $grafica -> grafica1Controller();
      $grafica -> grafica2Controller();
      $grafica -> grafica3Controller();
    ?>

<!--    <script type="text/javascript">
      var ctxL = document.getElementById("myAreaChart").getContext('2d');
var myAreaChart = new Chart(ctxL, {
  type: 'line',
  data: {
    labels: ["January", "February", "March", "April", "May", "June", "July"],
    datasets: [{
        label: "My First dataset",
        data: [65, 59, 80, 81, 56, 55, 40],
        backgroundColor: [
          'rgba(105, 0, 132, .2)',
        ],
        borderColor: [
          'rgba(200, 99, 132, .7)',
        ],
        borderWidth: 2
      },
      {
        label: "My Second dataset",
        data: [28, 48, 40, 19, 86, 27, 90],
        backgroundColor: [
          'rgba(0, 137, 132, .2)',
        ],
        borderColor: [
          'rgba(0, 10, 130, .7)',
        ],
        borderWidth: 2
      }
    ]
  },
  options: {
    responsive: true
  }
});
    </script>-->

	</div>

<script>
        $('#dataTable').dataTable( {
          "language": {
            url: 'views/vendor/datatables/es-mx.json' //Ubicacion del archivo con el json del idioma.
          },
             retrieve: true
        } );

 </script>

</body>
</html>