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

			$respuesta = Datos::consultaPacientesModel($datosController, "clientes");

			if ($respuesta["nombres"]==""){
				$respuesta = Datos::registroPacientesModel($datosController, "clientes");
				
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
				<td><a href="index.php?action=editar&id='.$item["idClientes"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=usuarios&idBorrar='.$item["idClientes"].'"><button>Borrar</button></a></td>
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
				<td><a href="index.php?action=editar&id='.$item["id"].'"><button>Editar</button></a></td>
				<td><a href="index.php?action=usuarios&idBorrar='.$item["id"].'"><button>Borrar</button></a></td>
			</tr>';

		}

	}




}
