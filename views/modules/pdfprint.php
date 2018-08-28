<?php 
	ob_start();
	if (!isset($_SESSION)){	
		session_start();
	}
	/* Connect To Database*/
	include("models/db.php");
	include("models/conexionv.php");

	require_once(dirname(__FILE__).'/../pdf/html2pdf.class.php');
	$presupuesto=intval($_GET['idPrint']);

	//obtener los datos de la empresa
	$perfil=mysqli_query($con,"select * from perfil limit 0,1");//Obtengo los datos de la empresa
	$rw_perfil=mysqli_fetch_array($perfil);

	//obtener los datos del cliente
	$sql_cliente=mysqli_query($con,"select * from clientes as c INNER JOIN presupuestos as p ON c.id=p.id_cliente INNER JOIN detalles as d ON p.id=d.id_presupuesto where p.id='$presupuesto' limit 0,1");
	$rw_cliente=mysqli_fetch_array($sql_cliente);
?>