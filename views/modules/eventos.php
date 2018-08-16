<?php

	header ('Content-Type: application/json');
	$pdo = new PDO ("mysql:dbname=sistema; host=localhost","root","");
	$accion = (isset($_GET['accion']))?$_GET['accion']:'leer';
	switch($accion){
		case 'agregar':
			$sentencia = $pdo -> prepare("INSERT INTO citas(title,tratamiento,empleada,start,end,estado) VALUES (:title,:tratamiento,NULL,:start,:end,NULL)");
			$resultado = $sentencia -> execute(array(
				"title" => $_POST['title'],
				"tratamiento" => $_POST['tratamiento'],
				"start" => $_POST['start'],
				"end" => $_POST['end']
			));
			echo json_encode($resultado);
		break;

		case 'modificarM':
			$resultado = false;
			$sentencia = $pdo -> prepare ("UPDATE citas SET
				title = :title,
				tratamiento = :tratamiento,
				empleada = :empleada,
				start = :start,
				end = :end
				WHERE idCitas = :idCitas");
			$resultado = $sentencia -> execute(array(
				"idCitas" => $_POST['idCitas'],
				"title" => $_POST['title'],
				"tratamiento" => $_POST['tratamiento'],
				"empleada" => $_POST['empleada'],
				"start" => $_POST['start'],
				"end" => $_POST['end']
			));
			echo json_encode($resultado);
		break;

		case 'modificar':
			$resultado = false;
			$sentenciaV = $pdo -> prepare ("INSERT INTO ventas (empleadaV,idProducto,fechaV,venta) VALUES (:empleada,:tratamiento,:start,300)");
			$resultadoV = $sentenciaV -> execute(array(
				"empleada" => $_POST['empleada'],
				"tratamiento" => $_POST['tratamiento'],
				"start" => $_POST['start']
			));
			$sentencia = $pdo -> prepare ("UPDATE citas SET
				title = :title,
				tratamiento = :tratamiento,
				empleada = :empleada,
				start = :start,
				end = :end
				WHERE idCitas = :idCitas");
			$resultado = $sentencia -> execute(array(
				"idCitas" => $_POST['idCitas'],
				"title" => $_POST['title'],
				"tratamiento" => $_POST['tratamiento'],
				"empleada" => $_POST['empleada'],
				"start" => $_POST['start'],
				"end" => $_POST['end']
			));
			echo json_encode($resultado);
		break;

		case 'eliminar':
			$resultado = false;
			if (isset($_POST["idCitas"])){
				$sentencia = $pdo -> prepare ("DELETE FROM citas WHERE idCitas = :idCitas");
				$resultado = $sentencia -> execute(array("idCitas" => $_POST["idCitas"]));
			}
			echo json_encode($resultado);
		break;

		default:	
			$sentencia = $pdo -> prepare ("SELECT * FROM citas");
			$sentencia ->execute();

			$resultado = $sentencia -> fetchAll (PDO::FETCH_ASSOC);
			echo json_encode($resultado);
		break;
	}