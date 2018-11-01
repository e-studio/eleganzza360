<?php

	header ('Content-Type: application/json');
	//$pdo = new PDO ("mysql:dbname=sistema; host=localhost","root","");
	$pdo = new PDO ("mysql:dbname=multie5_eleganzza360; host=localhost","multie5_eleganzza360","tQ=5%{j+qRxg");
	//$pdo = Conexion::conectar();
	$accion = (isset($_GET['accion']))?$_GET['accion']:'leer';
	switch($accion){
		case 'agregar':
			$resultado = false;
			$sentpre = $pdo -> prepare("INSERT INTO presupuestos(pre_cita,pre_agendo,pre_referida) VALUES (:ultimacita,:agendo,:referida)");
			$respre = $sentpre -> execute(array(
				"ultimacita" => $_POST['ultimacita'],
				"agendo" => $_POST['agendo'],
				"referida" => $_POST['referida']
			));
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
				start = :start,
				end = :end
				WHERE idCitas = :idCitas");
			$resultado = $sentencia -> execute(array(
				"idCitas" => $_POST['idCitas'],
				"title" => $_POST['title'],
				"tratamiento" => $_POST['tratamiento'],
				"start" => $_POST['start'],
				"end" => $_POST['end']
			));
			echo json_encode($resultado);
		break;

		case 'modificar':
			$resultado = false;
			$respre=false;
			$sentpre = $pdo -> prepare("UPDATE presupuestos SET pre_empleada=:empleada WHERE pre_cita=:idCitas");
			$respre = $sentpre -> execute(array(
				"idCitas" => $_POST['idCitas'],
				"empleada" => $_POST['empleada']
			));
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
				$sentencia = $pdo -> prepare ("UPDATE citas SET empleada = :empleada, estado = 'CANCELADA', nota = :nota WHERE idCitas = :idCitas");
				$resultado = $sentencia -> execute(array("idCitas" => $_POST["idCitas"], "empleada" => $_POST['empleada'], "nota" => $_POST['nota']));
			}
			echo json_encode($resultado);
		break;

		case 'usuarioagenda':
			$resultado = false;
			$sentencia = $pdo -> prepare ("SELECT * FROM usuarios WHERE password = :agendo");
			$sentencia -> execute(array("agendo" => $_POST['agendo']));
			$resultado = $sentencia -> fetch();
			echo json_encode($resultado);
		break;

		case 'usuarioatendio':
			$resultado = false;
			$sentencia = $pdo -> prepare ("SELECT * FROM usuarios WHERE password = :empleada");
			$sentencia -> execute(array("empleada" => $_POST['empleada']));
			$resultado = $sentencia -> fetch();
			echo json_encode($resultado);
		break;

		default:	
			$sentencia = $pdo -> prepare ("SELECT * FROM citas");
			$sentencia ->execute();

			$resultado = $sentencia -> fetchAll (PDO::FETCH_ASSOC);
			echo json_encode($resultado);
		break;
	}