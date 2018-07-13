<?php 

	header ('Content-Type: application/json');
	$pdo = new PDO("mysql:host=localhost; dbname=sistema", "root", "");

	$accion = (isset($_GET['accion']))?$_GET['accion']:'leer';

	switch ($accion){

		case 'agregar':

			try{//instrucciones de agregar
			$sentenciaSQL = $pdo -> prepare ("INSERT INTO citas (idPaciente, idTratamiento, idEmpleada, fechaInicio, fechaFin, color, colorTexto) VALUES (:title,:descripcion,:empleada,:start,:end,:color,:textColor)");
			$respuesta = $sentenciaSQL -> execute(array(
				"title" => $_POST["idPaciente"],
				"descripcion" => $_POST["idTratamiento"],
				"empleada" => $_POST["idEmpleada"],
				"start" => $_POST["fechaInicio"],
				"end" => $_POST["fechaFin"],
				"color" => $_POST["color"],
				"textColor" => $_POST["colorTexto"]
				
			));
			echo json_encode ($respuesta);

		break;}
		catch(Exception $e){
			echo ('Erreur : '.$e->getMessage());

		}

		case 'modificar':

			$sentenciaSQL = $pdo -> prepare("UPDATE eventos SET
				idPaciente = :title,
				idTratamiento = :descripcion,
				idEmpleada = :empleada,
				color = :color,
				colorTexto = :textColor,
				fechaInicio = :start,
				fechaFin = :end
				WHERE IdCitas = :ID
				");

			$respuesta = $sentenciaSQL -> execute(array(
				"ID" => $_POST['idCitas'],
				"title" => $_POST['idPaciente'],
				"descripcion" => $_POST['idTratamiento'],
				"color" => $_POST['color'],
				"textColor" => $_POST['colorTexto'],
				"start" => $_POST['FechaInicio'],
				"end" => $_POST['fechaFin']
			));

			echo json_encode($respuesta);

			//instrucciones de modificar
			//echo "Modificar";

		break;

		case 'eliminar':

			$respuesta = false;

			// hay algo en el id cuando me lo enviaste mediante la accion eliminar?
			if(isset($_POST['idCitas'])){

				$sentenciaSQL = $pdo -> prepare("DELETE FROM eventos WHERE IdCitas=:ID");
				$respuesta = $sentenciaSQL -> execute(array("ID" => $_POST['idCitas']));

			}

			echo json_encode($respuesta);
			// instrucciones de eliminar
			//echo "Eliminar";

		break;

		default:

			// seleccionar los eventos del calendario

			$sentenciaSQL = $pdo -> prepare("SELECT * FROM citas");
			$sentenciaSQL -> execute();

			$resultado = $sentenciaSQL -> fetchAll (PDO:: FETCH_ASSOC);
			echo json_encode ($resultado);

		break;

	}

	

 ?>