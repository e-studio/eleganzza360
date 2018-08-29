<?php

class MvcController{

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
				<td><a href="index.php?action=clientes&idBorrar='.$item["id"].'"><button class="btn btn-danger">Borrar</button></a></td>
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
				<td><a href="index.php?action=empleados&idBorrar='.$item["id"].'"><button class="btn btn-danger">Borrar</button></a></td>
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
				<td><a href="index.php?action=productos&idBorrar='.$item["idProductos"].'"><button class="btn btn-danger">Borrar</button></a></td>
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
				<td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button class="btn btn-danger">Borrar</button></a></td>
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
