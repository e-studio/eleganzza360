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
			$sentencia = $pdo -> prepare("INSERT INTO citas(title,tratamiento,tratamiento2,tratamiento3,tratamiento4,empleada,start,end,estado,agendo,referida) VALUES (:title,:tratamiento,:tratamiento2,:tratamiento3,:tratamiento4,NULL,:start,:end,NULL,:agendo,:referida)");
			$resultado = $sentencia -> execute(array(
				"title" => $_POST['title'],
				"tratamiento" => $_POST['tratamiento'],
				"tratamiento2" => $_POST['tratamiento2'],
				"tratamiento3" => $_POST['tratamiento3'],
				"tratamiento4" => $_POST['tratamiento4'],
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
				tratamiento2 = :tratamiento2,
				tratamiento3 = :tratamiento3,
				tratamiento4 = :tratamiento4,
				start = :start,
				end = :end
				WHERE idCitas = :idCitas");
			$resultado = $sentencia -> execute(array(
				"idCitas" => $_POST['idCitas'],
				"title" => $_POST['title'],
				"tratamiento" => $_POST['tratamiento'],
				"tratamiento2" => $_POST['tratamiento2'],
				"tratamiento3" => $_POST['tratamiento3'],
				"tratamiento4" => $_POST['tratamiento4'],
				"start" => $_POST['start'],
				"end" => $_POST['end']
			));
			echo json_encode($resultado);
		break;

		case 'modificar':
			$resultado = false;
			$sentencia = $pdo -> prepare("UPDATE presupuestos SET 
				pre_empleada = :empleada,
				pre_empleada2 = :empleada2,
				pre_empleada3 = :empleada3
				WHERE pre_cita = :idCitas");
			$resultado = $sentencia -> execute(array(
				"idCitas" => $_POST['idCitas'],
				"empleada" => $_POST['empleada'],
				"empleada2" => $_POST['empleada2'],
				"empleada3" => $_POST['empleada3']
			));
			$sentencia = $pdo -> prepare ("UPDATE citas SET
				title = :title,
				tratamiento = :tratamiento,
				tratamiento2 = :tratamiento2,
				tratamiento3 = :tratamiento3,
				tratamiento4 = :tratamiento4,
				empleada = :empleada,
				empleada2 = :empleada2,
				empleada3 = :empleada3,
				start = :start,
				end = :end,
				nota = :nota
				WHERE idCitas = :idCitas");
			$resultado = $sentencia -> execute(array(
				"idCitas" => $_POST['idCitas'],
				"title" => $_POST['title'],
				"tratamiento" => $_POST['tratamiento'],
				"tratamiento2" => $_POST['tratamiento2'],
				"tratamiento3" => $_POST['tratamiento3'],
				"tratamiento4" => $_POST['tratamiento4'],
				"empleada" => $_POST['empleada'],
				"empleada2" => $_POST['empleada2'],
				"empleada3" => $_POST['empleada3'],
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

		case 'usuarioatendio2':
			$resultado = false;
			$sentencia = $pdo -> prepare ("SELECT * FROM usuarios WHERE password = :empleada2");
			$sentencia -> execute(array("empleada2" => $_POST['empleada2']));
			$resultado = $sentencia -> fetch();
			echo json_encode($resultado);
		break;

		case 'usuarioatendio3':
			$resultado = false;
			$sentencia = $pdo -> prepare ("SELECT * FROM usuarios WHERE password = :empleada3");
			$sentencia -> execute(array("empleada3" => $_POST['empleada3']));
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