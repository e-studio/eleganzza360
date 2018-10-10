<?php

class MvcController{

	#DATOS PARA GRAFICA 1
    #------------------------------------
    public function grafica1Controller(){
    	//  crea el array para las citas atendidas
        $respuesta = Datos::grafica1aModel("presupuestos");
        $meses = array();
        $cantA = array();
        foreach ($respuesta as $row => $item){
            array_push($meses, $item["mes"]);
            array_push($cantA, $item["cantidad"]);

        }


        // Crea array para citas agendadas
        $respuesta = Datos::grafica1bModel("presupuestos");
        //$meses = array();
        $cantB = array();
        foreach ($respuesta as $row => $item){
            //array_push($meses, $item["mes"]);
            array_push($cantB, $item["cantidad"]);

        }

        // Crea array para citas referidas
        $respuesta = Datos::grafica1cModel("presupuestos");
        //$meses = array();
        $cantC = array();
        foreach ($respuesta as $row => $item){
            //array_push($meses, $item["mes"]);
            array_push($cantC, $item["cantidad"]);

        }



  /*      echo '<script type="text/javascript">'
            .'Chart.defaults.global.defaultFontFamily ='."'-apple-system,system-ui,BlinkMacSystemFont,".'"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif'."';"
            ."Chart.defaults.global.defaultFontColor = '#292b2c';"
            .'var ctx = document.getElementById("myAreaChart");'
            .'var myLineChart = new Chart(ctx, {'
            ." type: 'line',"
            .'data: {'
            .' labels:'.json_encode($meses).','
            .'datasets: [{'
            .'label: "Orders",'
            .'lineTension: 0.3,'
            .'backgroundColor: "rgba(2,117,216,0.2)",'
            .'borderColor: "rgba(2,117,216,1)",'
            .'pointRadius: 5,'
            .'pointBackgroundColor: "rgba(2,117,216,1)",'
            .'pointBorderColor: "rgba(255,255,255,0.8)",'
            .'pointHoverRadius: 5,'
            .'pointHoverBackgroundColor: "rgba(2,117,216,1)",'
            .'pointHitRadius: 20,'
            .'pointBorderWidth: 2,'
            .'data:'. json_encode($cant,JSON_NUMERIC_CHECK).','
            .'}],'
            .'},'
            .'options: {'
            .'legend: {'
            .'display: false'
            .'}'
            .'}'
            .'});'
            .'</script>';*/


            echo '<script type="text/javascript">'
            ."var ctxL = document.getElementById('myAreaChart').getContext('2d');
			var myAreaChart = new Chart(ctxL, {
			  type: 'line',"
            .'data: {
			     labels:'.json_encode($meses).',
			    datasets: [{
			        label: "Atendidas",
			        data:'. json_encode($cantA,JSON_NUMERIC_CHECK).',
			        backgroundColor: ['
			      ."    'rgba(50, 200, 50, .3)',
			        ],
			        borderColor: [
			          'rgba(200, 99, 132, .7)',
			        ],
			        borderWidth: 2
			      },
			      {"
			      .'  label: "Agendadas",
			        data:'. json_encode($cantB,JSON_NUMERIC_CHECK).',
			        backgroundColor: ['
			      ."    'rgba(200, 50, 50, .3)',
			        ],
			        borderColor: [
			          'rgba(0, 10, 130, .7)',
			        ],
			        borderWidth: 2
			      },
			      {"
			      .'  label: "Referidas",
			        data:'. json_encode($cantC,JSON_NUMERIC_CHECK).',
			        backgroundColor: ['
			      ."    'rgba(50, 50, 250, .7)',
			        ],
			        borderColor: [
			          'rgba(50, 50, 250, .7)',
			        ],
			        borderWidth: 2
			      }
			    ]
			  },
			  options: {
			    responsive: true
			  }
            });
            </script>";
    }

    #DATOS PARA GRAFICA 2
    #------------------------------------
    public function grafica2Controller(){

        $respuesta = Datos::grafica2Model("presupuestos");
        $meses = array();
        $cant = array();
        foreach ($respuesta as $row => $item){
            array_push($meses, $item["mes"]);
            $num = number_format($item["total"], 2, '.', '');
            array_push($cant, $num);

        }

        echo '<script type="text/javascript">'
            .'var ctx = document.getElementById("myBarChart");'
            .'var myLineChart = new Chart(ctx, {'
            ." type: 'bar',"
            .'data: {'
            .' labels:'.json_encode($meses).','
            .'datasets: [{'
            .'label: "$",'
            .'lineTension: 0.3,'
            .'backgroundColor: "rgba(2,117,216,1)",'
            .'borderColor: "rgba(2,117,216,1)",'
            .'pointRadius: 5,'
            .'pointBackgroundColor: "rgba(2,117,216,1)",'
            .'pointBorderColor: "rgba(255,255,255,0.8)",'
            .'pointHoverRadius: 5,'
            .'pointHoverBackgroundColor: "rgba(2,117,216,1)",'
            .'pointHitRadius: 20,'
            .'pointBorderWidth: 2,'
            .'data:'. json_encode($cant,JSON_NUMERIC_CHECK).','
            .'}],'
            .'},'
            .'options: {'
            .'legend: {'
            .'display: false'
            .'}'
            .'}'
            .'});'
            .'</script>';
    }


#DATOS PARA GRAFICA 3
    #------------------------------------
    public function grafica3Controller(){

        $respuesta = Datos::grafica3Model();
        $empleado = array();
        $citas = array();
        //$cant = array();
        foreach ($respuesta as $row => $item){
            array_push($empleado, $item["empleado"]);
            array_push($citas, $item["citas"]);
            //$num = number_format($item["total"], 2, '.', '');
            //array_push($cant, $num);
            $mes = $item["mes"];

        }

        //echo 'Este es el mes:'.$mes;

        echo '<script type="text/javascript">'
        	  .'var ctxP = document.getElementById("myPieChart").getContext("2d");'
			  .'var myPieChart = new Chart(ctxP, {'
    		  ."type: 'pie',"
			  .'data: {
			       labels:'.json_encode($empleado).',
			        datasets: [
			            {
			            	data:'. json_encode($citas,JSON_NUMERIC_CHECK).',
			                backgroundColor: ["#FDB45C", "#949FB1", "#F7464A", "#46BFBD", "#4D5360"],
			                hoverBackgroundColor: ["#FFC870", "#A8B3C5", "#FF5A5E", "#5AD3D1", "#616774"]
			            }
			        ]
			    },
			    options: {
			        responsive: true
			    }
			});'
			.'document.getElementById("mesPie").innerHTML="'.$mes.'";'
			.'</script>'
			;
    }


    #CORTE DE CAJA
	#------------------------------------
	public function corteController(){
		$suma=0;
		if(isset($_POST["fechaInicioCorte"])){
			$inicio = $_POST["fechaInicioCorte"];
			$fin = date('Y-m-d H:i:s', strtotime('+23 hour +59 minutes +59 seconds', strtotime($inicio)));
			
			$respuesta = Datos::corteModel($inicio, $fin);
			
			echo '<div class="card mb-3">
			        <div class="card-header">
			          <i class="fa fa-table"></i><strong>Corte de caja</strong></div>
			        <div class="card-body">
			          <div class="table-responsive">
			            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			              <thead>
			                <tr>
			                  <th>Paciente</th>
			                  <th>Tratamiento</th>
			                  <th>Total</th>
			                </tr>
			              </thead>';

			foreach ($respuesta as $row => $item){
				echo'<tr>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["descripcion"].'</td>
				<td>';
				
				setlocale(LC_MONETARY, 'en_US');
				echo money_format('%(#10n', $item["total"]); 
				echo'</td>
				</tr>';
				$suma+=$item["total"];
			}
			


		}

		echo '</tbody>
		<tfoot>
		<th></th>
		<th><strong>Total del Corte</strong></th>
		<th><strong>$ '.$suma.'.00</strong></th>
        </table>
     	</div>
    	</div>
		</div>';
	}


	#LISTA DE PACIENTES EN MODAL
	#------------------------------------
	public function llenaModelos(){
		$respuesta = Datos::llenaLista("clientes");
		echo '<option value=""> Seleccione Paciente: </option>';
		foreach ($respuesta as $row =>$valor){
			echo '<option value="'.$valor["nomCompleto"].'">'.$valor["nomCompleto"].'</option>';
		}
	}

	#LISTA DE PRODUCTOS EN MODAL
	#------------------------------------
	public function llenaModelosProd(){
		$respuesta = Datos::llenaListaProd("productos");
		echo '<option value=""> Seleccione Producto: </option>';
		foreach ($respuesta as $row =>$valor){
			echo '<option value="'.$valor["nombre"].'">'.$valor["nombre"].'</option>';
		}
	}

	#REGISTRO DE USUARIOS
	#------------------------------------
	public function registroUsuarioController(){

		if(isset($_POST["usuario"])){

			$datosController = array( "nombre"=>$_POST["nombre"],
									  "usuario"=>$_POST["usuario"],
								      "password"=>$_POST["password"],
								      "email"=>$_POST["email"],
								      "celular"=>$_POST["celular"],
								      "sistema"=>$_POST["sistema"],
								      "rol"=>$_POST["rol"],
								      "activo"=>$_POST["activo"]);

			$respuesta = Datos::registroUsuarioModel($datosController, "usuarios");

			if($respuesta == "success"){

				//header("location:index.php?action=ok");
			}

			else{

				//header("location:index.php");
			}
		}
	}

	# REGISTRO DE CLIENTES
	#------------------------------------

	public function registroClientesController(){

		if(isset($_POST["nombres"])){

			$datosController = array( "nombres"=>$_POST["nombres"],
									  "apellidos"=>$_POST["apellidos"],
								      "email"=>$_POST["email"],
								      "telefono"=>$_POST["telLocal"],
								      "movil"=>$_POST["celular"],
								      "direccion"=>$_POST["direccion"],
								      "fechaNac"=>$_POST["fechaNac"]);

			$respuesta = Datos::consultaClientesModel($datosController, "clientes");

			if ($respuesta["nombres"]==""){
				$respuesta = Datos::registroClientesModel($datosController, "clientes");

				if ($respuesta=="ok"){
					echo '<div class="alert alert-success">';
  					echo 'Cliente Registrado Exitosamente!.';
					echo '</div>';
				}
			}
			else{

				echo '<div class="alert alert-danger">';
  				echo "<strong>Error!</strong> esos datos ya estan registrados.";
				echo "</div>";
			}

		}

	}


	# ACTUALIZA CLIENTES
	#------------------------------------

	public function actualizaClienteController(){

		if(isset($_POST["nombres"])){

			$datosController = array( "id"=>$_POST["id"],
								  "nombres"=>$_POST["nombres"],
								  "apellidos"=>$_POST["apellidos"],
							      "email"=>$_POST["email"],
							      "telefono"=>$_POST["telLocal"],
							      "movil"=>$_POST["celular"],
							      "direccion"=>$_POST["direccion"],
							      "fechaNac"=>$_POST["fechaNac"]);

			$respuesta = Datos::actualizaClienteModel($datosController, "clientes");

			if ($respuesta=="ok"){

				$mensaje = "Actualizacion correcta";
				echo "<script type='text/javascript'>alert('$mensaje'); window.location.href='index.php?action=clientes'</script>";
			}
			else{

				echo '<div class="alert alert-danger">';
					echo "<strong>Error!</strong> esos datos ya estan registrados.";
				echo "</div>";
			}

		}

	}

	# ACTUALIZA PRODUCTOS
	#------------------------------------

	public function actualizaProductoController(){

		if(isset($_POST["nombre"])){

			$datosController = array("idProductos"=>$_POST["idProductos"],
								  "nombre"=>$_POST["nombre"],
								  "categoria"=>$_POST["categoria"],
							      "precio"=>$_POST["precio"]);

			$respuesta = Datos::actualizaProductoModel($datosController, "productos");

			if ($respuesta=="ok"){

				$mensaje = "Actualizacion correcta";
				echo "<script type='text/javascript'>alert('$mensaje'); window.location.href='index.php?action=productos'</script>";
			}
			else{

				echo '<div class="alert alert-danger">';
					echo "<strong>Error!</strong> no se pudo actualizar.";
				echo "</div>";
			}

		}

	}

	# ACTUALIZA EMPLEADOS
	#------------------------------------

	public function actualizaEmpleadoController(){

		if(isset($_POST["usuario"])){

			$datosController = array("id"=>$_POST["id"],
								  "usuario"=>$_POST["usuario"],
								  "password"=>$_POST["password"],
							      "nombre"=>$_POST["nombre"],
							      "rol"=>$_POST["rol"],
							      "celular"=>$_POST["celular"],
							      "email"=>$_POST["email"]);

			$respuesta = Datos::actualizaEmpleadoModel($datosController, "usuarios");

			if ($respuesta=="ok"){

				$mensaje = "Actualizacion correcta";
				echo "<script type='text/javascript'>alert('$mensaje'); window.location.href='index.php?action=empleados'</script>";
			}
			else{

				echo '<div class="alert alert-danger">';
					echo "<strong>Error!</strong> esos datos ya estan registrados.";
				echo "</div>";
			}

		}

	}

	#LISTADO DE CLIENTES
	#------------------------------------

	public function listaClientesController(){

		$respuesta = Datos::listaClientesModel("clientes");

		foreach ($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["nombres"].'</td>
				<td>'.$item["apellidos"].'</td>
				<td>'.$item["movil"].'</td>
				<td>'.$item["telefono"].'</td>
				<td>'.$item["email"].'</td>
				<td><a href="index.php?action=editCliente&idEditar='.$item["id"].'"><button class="btn btn-warning">Editar</button></a></td>
				<td><a href="index.php?action=clientes&idBorrar='.$item["id"].'" onclick="return Confirmation()"><button class="btn btn-danger">Borrar</button></a></td>
				<td><a href="index.php?action=hisCliente&idHis='.$item["nombres"].' '.$item["apellidos"].'"><button class="btn btn-primary">Historial</button></a></td>
			</tr>';
		}

	}

	#LISTADO DE INGRESOS POR CLIENTE
	#------------------------------------

	public function ingresosClientesController(){

		$respuesta = Datos::ingresosClientesModel("presupuestos");

		foreach ($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["nombres"].'</td>
				<td>'.$item["apellidos"].'</td>
				<td>';
		setlocale(LC_MONETARY, 'en_US');
	  	echo money_format('%(#10n', $item["total"]);
	  	echo'</td>
			</tr>';
		}

	}


	#LISTADO DE COMISIONES POR EMPLEADO
	#------------------------------------

	public function comisionesController(){

			if(isset($_POST["fechaInicio"])){
				$inicio = $_POST["fechaInicio"];
				$fin = $_POST["fechaFin"];
				$tipoComision = $_POST["tipoComision"];

				if ($tipoComision == 2) {
					$campo = 'presupuestos.pre_empleada';
					$desc = 'Atendidos';
				}
				else if ($tipoComision == 1) {
					$campo = 'presupuestos.pre_agendo';
					$desc = 'Agendados';
				}
				else if ($tipoComision == 3) {
					$campo = 'presupuestos.pre_referida';
					$desc = 'Referidos';
				}
				else {
					$campo = 'presupuestos.pre_empleada';
					$desc = 'Atendidos';
				}

				$respuesta = Datos::comisionesModel($campo, $inicio, $fin);

				echo '<div class="card mb-3">
				        <div class="card-header">
				          <i class="fa fa-table"></i> Comisiones por clientes <strong>'.$desc.'</strong></div>
				        <div class="card-body">
				          <div class="table-responsive">
				            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				              <thead>
				                <tr>
				                  <th>Nombre</th>
				                  <th>Total</th>
				                </tr>
				              </thead>';

				foreach ($respuesta as $row => $item){
				echo'<tr>
						<td>'.$item["nombre"].'</td>
						<td>';
				setlocale(LC_MONETARY, 'en_US');
			  	echo money_format('%(#10n', $item["Total"]);
			  	echo'</td>
					</tr>';
				}

				echo '</tbody>
            </table>
          </div>
        </div>

      </div>';
			}

	}

	#LISTADO DE INGRESOS DE LOS CLIENTES POR EL MES ACTUAL
	#------------------------------------------------------

	public function ingresosMesClientesController(){

		$respuesta = Datos::ingresosMesClientesModel("presupuestos");

		foreach ($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["nombres"].'</td>
				<td>'.$item["apellidos"].'</td>
				<td>';
		setlocale(LC_MONETARY, 'en_US');
	  	echo money_format('%(#10n', $item["total"]);
	  	echo'</td>
			</tr>';
		}

	}




	#LISTADO DE CLIENTES PROXIMOS A CUMPLIR ANIOS
	#------------------------------------

	public function listaCumplesController(){

		$respuesta = Datos::listaCumplesModel("clientes");

		foreach ($respuesta as $row => $item){
		echo '<div class="card">
			  <h5 class="card-header">'.$item["nombres"]." ".$item["apellidos"].'</h5>
			  <div class="card-body">
			    <h5 class="card-title">Datos de Contacto</h5>
			    <p class="card-text">Fecha de Nacimiento : '.$item["fechaNac"].'</p>
			    <p class="card-text">Telefono Celular : '.$item["movil"].'</p>
			    <p class="card-text">Telefono Casa : '.$item["telefono"].'</p>
			    <p class="card-text">E-Mail : '.$item["email"].'</p>
			  </div>
			</div>';
		}

	}

	#LISTADO DE NOTAS DE VENTA
	#------------------------------------

	public function listaNotasController(){

		$respuesta = Datos::listaNotasModel("clientes","presupuestos");

		foreach ($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["id"].'</td>
				<td>'.$item["fecha"].'</td>
				<td>'.$item["nombres"].' '.$item["apellidos"].'</td>
				<td>'.$item["descripcion"].'</td>
				<td><a href="index.php?action=pdfprint&idPrint='.$item["id"].'"><button class="btn btn-warning">Reimprimir</button></a></td>
			</tr>';
		}

	}

#LISTADO DEL HISTORIAL DE CLIENTES
	#------------------------------------

	public function listaHistorialController($histo){

		$respuesta = Datos::listaHistorialModel($histo, "citas");

		foreach ($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["title"].'</td>
				<td>'.$item["tratamiento"].'</td>
				<td>'.$item["start"].'</td>
				<td>'.$item["empleada"].'</td>
				<td>'.$item["nota"].'</td>

			</tr>';
		}

	}

	#LISTADO DE EMPLEADOS
	#------------------------------------
	public function listaEmpleadosController(){

		$respuesta = Datos::listaEmpleadosModel("usuarios");

		foreach ($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["usuario"].'</td>
				<td>'.$item["password"].'</td>
				<td>'.$item["email"].'</td>
				<td>'.$item["celular"].'</td>
				<td><a href="index.php?action=editEmpleados&idEditar='.$item["id"].'"><button class="btn btn-warning">Editar</button></a></td>
				<td><a href="index.php?action=empleados&idBorrar='.$item["id"].'" onclick="return Confirmation()"><button class="btn btn-danger">Borrar</button></a></td>
			</tr>';
		}

	}


	# REGISTRO DE PRODUCTOS
	#------------------------------------

	public function registroProductosController(){

		if(isset($_POST["nombre"])){

			$datosController = array( "nombre"=>$_POST["nombre"],
									  "categoria"=>$_POST["categoria"],
								      "precio"=>$_POST["precio"]);

			$respuesta = Datos::consultaProductosModel($datosController, "productos");

			if ($respuesta["nombre"]==""){
				$respuesta = Datos::registroProductosModel($datosController, "productos");

				if ($respuesta=="ok"){
					echo '<div class="alert alert-success">';
  					echo 'Producto Registrado Exitosamente!.';
					echo '</div>';
				}
				else {
					echo "error al insertar";
				}
			}
			else{

					echo '<div class="alert alert-danger">';
  					echo "<strong>Error!</strong> esos datos ya estan registrados.";
					echo "</div>";
				}

		}

	}

	# REGISTRO DE EMPLEADOS
	#------------------------------------

	public function registroEmpleadosController(){

		if(isset($_POST["usuario"])){

			$datosController = array( "usuario"=>$_POST["usuario"],
									  "password"=>$_POST["password"],
								      "nombre"=>$_POST["nombre"],
								      "celular"=>$_POST["celular"],
								      "rol"=>$_POST["rol"],
								      "email"=>$_POST["email"]);

			$respuesta = Datos::consultaEmpleadosModel($datosController, "usuarios");

			if ($respuesta["usuario"]==""){
				$respuesta = Datos::registroEmpleadosModel($datosController, "usuarios");

				if ($respuesta=="ok"){
					echo '<div class="alert alert-success">';
  					echo 'Empleado Registrado Exitosamente!.';
					echo '</div>';
				}
				else {
					echo "error al insertar";
				}
			}
			else{

					echo '<div class="alert alert-danger">';
  					echo "<strong>Error!</strong> esos datos ya estan registrados.";
					echo "</div>";
				}

		}

	}



	#LISTADO DE PRODUCTOS
	#------------------------------------

	public function listaProductosController(){

		$respuesta = Datos::listaProductosModel("productos");

		foreach ($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["categoria"].'</td>
				<td>'.$item["precio"].'</td>
				<td><a href="index.php?action=editProducto&idEditar='.$item["idProductos"].'"><button class="btn btn-warning">Editar</button></a></td>
				<td><a href="index.php?action=productos&idBorrar='.$item["idProductos"].'" onclick="return Confirmation()"><button class="btn btn-danger">Borrar</button></a></td>
			</tr>';
		}

	}


	#VISTA DE USUARIOS
	#------------------------------------

	public function vistaUsuariosController(){

		$respuesta = Datos::vistaUsuariosModel("usuarios");

		#El constructor foreach proporciona un modo sencillo de iterar sobre arrays. foreach funciona sólo sobre arrays y objetos, y emitirá un error al intentar usarlo con una variable de un tipo diferente de datos o una variable no inicializada.

		foreach($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["usuario"].'</td>
				<td>'.$item["password"].'</td>
				<td>'.$item["email"].'</td>
				<td><a href="index.php?action=editar&id='.$item["id"].'"><button class="btn btn-warning">Editar</button></a></td>
				<td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'" onclick="return Confirmation()"><button class="btn btn-danger">Borrar</button></a></td>
			</tr>';

		}

	}

	#BORRAR USUARIO
	#------------------------------------
	public function borrarClienteController(){
		if (isset($_GET['idBorrar'])){
			$datosController = $_GET['idBorrar'];
			$respuesta = Datos::borrarClienteModel($datosController,"clientes");
			if ($respuesta == "success"){
				echo "<script type='text/javascript'>window.location.href='index.php?action=clientes'</script>";
			}
		}
	}

	#BORRAR PRODUCTO
	#------------------------------------
	public function borrarProductoController(){
		if (isset($_GET['idBorrar'])){
			$datosController = $_GET['idBorrar'];
			$respuesta = Datos::borrarProductoModel($datosController,"productos");
			if ($respuesta == "success"){
				echo "<script>window.location.href='index.php?action=productos'</script>";
			}
		}
	}

	#BORRAR EMPLEADO
	#------------------------------------
	public function borrarEmpleadoController(){
		if (isset($_GET['idBorrar'])){
			$datosController = $_GET['idBorrar'];
			$respuesta = Datos::borrarEmpleadoModel($datosController,"usuarios");
			if ($respuesta == "success"){
				echo "<script type='text/javascript'>window.location.href='index.php?action=empleados'</script>";
			}
		}
	}

}
