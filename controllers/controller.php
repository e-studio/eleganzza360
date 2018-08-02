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
								      "tel"=>$_POST["telLocal"],
								      "movil"=>$_POST["celular"]);

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

			$datosController = array( "idclientes"=>$_POST["id"],
								  "nombres"=>$_POST["nombres"],
								  "apellidos"=>$_POST["apellidos"], 
							      "email"=>$_POST["email"],
							      "tel"=>$_POST["telLocal"],
							      "movil"=>$_POST["celular"]);

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



	#LISTADO DE CLIENTES
	#------------------------------------

	public function listaClientesController(){

		$respuesta = Datos::listaClientesModel("clientes");

		foreach ($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["nombres"].'</td>
				<td>'.$item["apellidos"].'</td>
				<td>'.$item["movil"].'</td>
				<td>'.$item["tel"].'</td>
				<td>'.$item["email"].'</td>
				<td><a href="index.php?action=editCliente&idEditar='.$item["idclientes"].'"><button class="btn btn-warning">Editar</button></a></td>
				<td><a href="index.php?action=clientes&idBorrar='.$item["idclientes"].'"><button class="btn btn-danger">Borrar</button></a></td>
			</tr>';
		}

	}


	# REGISTRO DE PRODUCTOS
	#------------------------------------

	public function registroProductosController(){

		if(isset($_POST["nombre"])){

			$datosController = array( "nombre"=>$_POST["nombre"],
									  "categoria"=>$_POST["categoria"], 
								      "precio"=>$_POST["precio"],
								      "paquete"=>$_POST["paquete"]);

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


	#LISTADO DE PRODUCTOS
	#------------------------------------

	public function listaProductosController(){

		$respuesta = Datos::listaProductosModel("productos");

		foreach ($respuesta as $row => $item){
		echo'<tr>
				<td>'.$item["nombre"].'</td>
				<td>'.$item["categoria"].'</td>
				<td>'.$item["precio"].'</td>
				<td>'.$item["paquete"].'</td>
				<td><a href="index.php?action=editar&id='.$item["idProductos"].'"><button class="btn btn-warning">Editar</button></a></td>
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


}
