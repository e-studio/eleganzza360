<?php
	if (!isset($_SESSION)){
	  session_start();
	}

if(!$_SESSION["validar"]){

	header("location:index.php");
	echo $_SESSION["validar"];
	exit();

}

if ($_SESSION["rol"] > 0){
 include "navUsuario.php";
}
else {
  include "navAdmin.php";
}

	$presupuesto=intval($_GET['idPrint']);
	/* Connect To Database*/
	include("models/db.php");
	include("models/conexionv.php");
	$session_id= session_id();
	$sql_count=mysqli_query($con,"select * from detalle where id_presupuesto='$presupuesto'");
	$count=mysqli_num_rows($sql_count);
	if ($count==0)
	{
	echo "<script>alert('No hay productos agregados al presupuesto')</script>";

	//echo "<script>window.close();</script>";
	exit;
	}
	
	$numero=$presupuesto;

	//obtener los datos de la empresa
	$perfil=mysqli_query($con,"select * from perfil limit 0,1");//Obtengo los datos de la empresa
	$rw_perfil=mysqli_fetch_array($perfil);

	//obtener los datos del cliente
	$sql_cliente=mysqli_query($con,"select c.id, c.nombres, c.apellidos, c.telefono, c.movil, c.email, c.direccion, c.fechaNac, p.descripcion from clientes as c INNER JOIN presupuestos as p ON concat(c.nombres,' ',c.apellidos)=p.id_cliente where p.id='$presupuesto' limit 0,1");
	$rw_cliente=mysqli_fetch_array($sql_cliente);


?>
<script>
	var cliente = '<?php echo $rw_cliente['id']; ?>';
	var descripcion = '<?php echo $rw_cliente['descripcion']; ?>';
	var ppto = '<?php echo $presupuesto; ?>';
	
		VentanaCentrada('views/pdf/documentos/presprint.php?cliente='+cliente+'&descripcion='+descripcion+'&ppto='+ppto,'Presupuesto','','1024','768','true');
		window.location.href="index.php?action=reimpresion";
   
</script>