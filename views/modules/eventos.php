<?php

	header ('Content-Type: application/json');
	$pdo = new PDO ("mysql:dbname=sistema; host=localhost","root","");
	$accion = (isset($_GET['accion']))?$_GET['accion']:'leer';
	switch($accion){
		case 'agregar':
			
			$sentencia = $pdo -> prepare("INSERT INTO citas(title,tratamiento,empleada,start,end,estado,agendo,referida) VALUES (:title,:tratamiento,NULL,:start,:end,NULL,:agendo,:referida)");
			$resultado = $sentencia -> execute(array(
				"title" => $_POST['title'],
				"tratamiento" => $_POST['tratamiento'],
				"start" => $_POST['start'],
				"end" => $_POST['end'],
				"agendo" => $_POST['agendo'],
				"referida" => $_POST['referida']
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
			
			$sentencia = $pdo -> prepare ("UPDATE citas SET
				title = :title,
				tratamiento = :tratamiento,
				empleada = :empleada,
				start = :start,
				end = :end,
				nota = :nota
				WHERE idCitas = :idCitas");
			$resultado = $sentencia -> execute(array(
				"idCitas" => $_POST['idCitas'],
				"title" => $_POST['title'],
				"tratamiento" => $_POST['tratamiento'],
				"empleada" => $_POST['empleada'],
				"start" => $_POST['start'],
				"end" => $_POST['end'],
				"nota" => $_POST['nota']
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