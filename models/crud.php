<?php
require_once "conexion.php";

class Datos extends Conexion{

	#REGISTRO DE USUARIOS
	#-------------------------------------
	public function registroUsuarioModel($datosModel, $tabla){

		#prepare() Prepara una sentencia SQL para ser ejecutada por el método PDOStatement::execute(). La sentencia SQL puede contener cero o más marcadores de parámetros con nombre (:name) o signos de interrogación (?) por los cuales los valores reales serán sustituidos cuando la sentencia sea ejecutada. Ayuda a prevenir inyecciones SQL eliminando la necesidad de entrecomillar manualmente los parámetros.

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, usuario, password, email, sistema, rol, activo) VALUES (:nombre,:usuario,:password,:email,:sistema,:rol,:activo)");	

		#bindParam() Vincula una variable de PHP a un parámetro de sustitución con nombre o de signo de interrogación correspondiente de la sentencia SQL que fue usada para preparar la sentencia.

		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);
		$stmt->bindParam(":sistema", $datosModel["sistema"], PDO::PARAM_STR);
		$stmt->bindParam(":rol", $datosModel["rol"], PDO::PARAM_INT);
		$stmt->bindParam(":activo", $datosModel["activo"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();

	}


	#VERIFICA SI UN CLIENTE YA ESTA REGISTRADO
	#-------------------------------------

	public function consultaClientesModel($datosModel, $tabla){



		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE nombres = :nombres and apellidos = :apellidos and movil = :movil");

		$stmt->bindParam(":nombres", $datosModel["nombres"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidos", $datosModel["apellidos"], PDO::PARAM_STR);
		$stmt->bindParam(":movil", $datosModel["movil"], PDO::PARAM_STR);
		
		$stmt -> execute();
		return $stmt -> fetch();

		$stmt->close();
	}



	#BUSCA UN CLIENTE
	#-------------------------------------

	public function buscaClienteModel($cliente, $tabla){



		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE idclientes = :idcliente");

		$stmt->bindParam(":idcliente", $cliente, PDO::PARAM_INT);
		
		$stmt -> execute();
		return $stmt -> fetch();

		$stmt->close();
	}
	
	#BUSCA UN PRODUCTO
	#-------------------------------------

	public function buscaProductoModel($producto, $tabla){



		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $usuario, PDO::PARAM_INT);
		
		$stmt -> execute();
		return $stmt -> fetch();

		$stmt->close();
	}

	#BUSCA UN EMPLEADO
	#-------------------------------------

	public function buscaEmpleadoModel($usuario, $tabla){



		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $usuario, PDO::PARAM_INT);
		
		$stmt -> execute();
		return $stmt -> fetch();

		$stmt->close();
	}
	
	

	#DEVUELVE UN LISTADO DE TODOS LOS CLIENTES
	#-------------------------------------

	public function listaClientesModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt -> execute();
		return $stmt -> fetchALL();

		$stmt->close();
	}

	#DEVUELVE UN LISTADO DEL HISTORIAL DE CLIENTES
	#-------------------------------------

	public function listaHistorialModel($historial,$tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE title=:historial");
		$stmt->bindParam(":historial",$historial,PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetchALL();

		$stmt->close();
	}

	
	#DEVUELVE UN LISTADO DE TODOS LOS EMPLEADOS
	#-------------------------------------

	public function listaEmpleadosModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt -> execute();
		return $stmt -> fetchALL();

		$stmt->close();
	}


	#REGISTRO DE Clientes
	#-------------------------------------
	public function registroClientesModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombres, apellidos, tel, movil, email) VALUES (:nombres,:apellidos,:tel, :movil, :email)");

		$stmt->bindParam(":nombres", $datosModel["nombres"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidos", $datosModel["apellidos"], PDO::PARAM_STR);
		$stmt->bindParam(":tel", $datosModel["tel"], PDO::PARAM_STR);
		$stmt->bindParam(":movil", $datosModel["movil"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";

		}

		else{

			return "error";

		}

		$stmt->close();

	}




	#ACTUALIZA CLIENTE
	#-------------------------------------
	public function actualizaClienteModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombres=:nombres, apellidos=:apellidos, tel=:tel, movil=:movil, email=:email WHERE idclientes=:idclientes");

		$stmt->bindParam(":idclientes", $datosModel["idclientes"], PDO::PARAM_INT);
		$stmt->bindParam(":nombres", $datosModel["nombres"], PDO::PARAM_STR);
		$stmt->bindParam(":apellidos", $datosModel["apellidos"], PDO::PARAM_STR);
		$stmt->bindParam(":tel", $datosModel["tel"], PDO::PARAM_STR);
		$stmt->bindParam(":movil", $datosModel["movil"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);


		/*var_dump($stmt);
		echo "<br>".$datosModel['idclientes'];
		echo "<br>".$datosModel['nombres'];
		echo "<br>".$datosModel['apellidos'];
		echo "<br>".$datosModel['tel'];
		echo "<br>".$datosModel['movil'];
		echo "<br>".$datosModel['email'];*/
		



		if($stmt->execute()){

			return "ok";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

	#ACTUALIZA EMPLEADO
	#-------------------------------------
	public function actualizaEmpleadoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET usuario=:usuario, password=:password, nombre=:nombre, email=:email WHERE id=:id");

		$stmt->bindParam(":id", $datosModel["id"], PDO::PARAM_INT);
		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);


		/*var_dump($stmt);
		echo "<br>".$datosModel['idclientes'];
		echo "<br>".$datosModel['nombres'];
		echo "<br>".$datosModel['apellidos'];
		echo "<br>".$datosModel['tel'];
		echo "<br>".$datosModel['movil'];
		echo "<br>".$datosModel['email'];*/
		



		if($stmt->execute()){

			return "ok";

		}

		else{

			return "error";

		}

		$stmt->close();

	}

#ACTUALIZA PRODUCTO
	#-------------------------------------
	public function actualizaProductoModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET nombre=:nombre, categoria=:categoria, precio=:precio, paquete=:paquete WHERE idProductos=:idProductos");

		$stmt->bindParam(":idProductos", $datosModel["idProductos"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":categoria", $datosModel["categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datosModel["precio"], PDO::PARAM_STR);
		$stmt->bindParam(":paquete", $datosModel["paquete"], PDO::PARAM_STR);
		/*$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);


		/*var_dump($stmt);
		echo "<br>".$datosModel['idclientes'];
		echo "<br>".$datosModel['nombres'];
		echo "<br>".$datosModel['apellidos'];
		echo "<br>".$datosModel['tel'];
		echo "<br>".$datosModel['movil'];
		echo "<br>".$datosModel['email'];*/
		



		if($stmt->execute()){

			return "ok";

		}

		else{

			return "error";

		}

		$stmt->close();

	}


	#VERIFICA SI UN PRODUCTO YA ESTA REGISTRADO
	#-------------------------------------

	public function consultaProductosModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE nombre = :nombre and categoria = :categoria");

		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":categoria", $datosModel["categoria"], PDO::PARAM_STR);
				
		$stmt -> execute();
		return $stmt -> fetch();

		$stmt->close();
	}

	#VERIFICA SI UN EMPLEADO YA ESTA REGISTRADO
	#-------------------------------------

	public function consultaEmpleadosModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE usuario = :usuario and password = :password");

		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
				
		$stmt -> execute();
		return $stmt -> fetch();

		$stmt->close();
	}



	#REGISTRO DE PRODUCTOS
	#-------------------------------------
	public function registroProductosModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre, categoria, precio, paquete) VALUES (:nombre,:categoria,:precio,:paquete)");

		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":categoria", $datosModel["categoria"], PDO::PARAM_STR);
		$stmt->bindParam(":precio", $datosModel["precio"], PDO::PARAM_STR);
		$stmt->bindParam(":paquete", $datosModel["paquete"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";

		}

		else{

			return "error";

			//return "INSERT INTO $tabla (nombre, categoria, precio, paquete) VALUES (".$datosModel["nombre"].",".$datosModel["categoria"].",".$datosModel["precio"].",".$datosModel["paquete"].")";

		}

		$stmt->close();

	}

	#REGISTRO DE EMPLEADOS
	#-------------------------------------
	public function registroEmpleadosModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla (usuario, password, nombre, email) VALUES (:usuario,:password,:nombre,:email)");

		$stmt->bindParam(":usuario", $datosModel["usuario"], PDO::PARAM_STR);
		$stmt->bindParam(":password", $datosModel["password"], PDO::PARAM_STR);
		$stmt->bindParam(":nombre", $datosModel["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":email", $datosModel["email"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";

		}

		else{

			return "error";

			//return "INSERT INTO $tabla (nombre, categoria, precio, paquete) VALUES (".$datosModel["nombre"].",".$datosModel["categoria"].",".$datosModel["precio"].",".$datosModel["paquete"].")";

		}

		$stmt->close();

	}


	#DEVUELVE UN LISTADO DE TODOS LOS PRODUCTOS
	#-------------------------------------

	public function listaProductosModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt -> execute();
		return $stmt -> fetchALL();

		$stmt->close();
	}


	#VISTA USUARIOS
	#-------------------------------------

	public function vistaUsuariosModel($tabla){

		$stmt = Conexion::conectar()->prepare("SELECT id, usuario, password, email FROM $tabla");	
		$stmt->execute();

		#fetchAll(): Obtiene todas las filas de un conjunto de resultados asociado al objeto PDOStatement. 
		return $stmt->fetchAll();

		$stmt->close();

	}

	#BORRAR CLIENTE
	#-------------------------------------
	public function borrarClienteModel($datosModel,$tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idclientes = :idclientes");
		$stmt -> bindPARAM(":idclientes", $datosModel, PDO::PARAM_INT);
		if ($stmt->execute()){
			return "success";
		} else {
			return "error";
		}
		$stmt -> close();
	}
	#BORRAR PRODUCTO
	#-------------------------------------
	public function borrarProductoModel($datosModel,$tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE idProductos = :idProductos");
		$stmt -> bindPARAM(":idProductos",$datosModel, PDO::PARAM_INT);
		if ($stmt->execute()){
			return "success";
		} else {
			return "error";
		}
		$stmt -> close();
	}
	
	#BORRAR EMPLEADO
	#-------------------------------------
	public function borrarEmpleadoModel($datosModel,$tabla){
		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
		$stmt -> bindPARAM(":id",$datosModel, PDO::PARAM_INT);
		if ($stmt->execute()){
			return "success";
		} else {
			return "error";
		}
		$stmt -> close();
	}

}