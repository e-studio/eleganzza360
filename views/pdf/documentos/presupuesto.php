<?php
	/*-------------------------
	Autor: Obed Alvarado
	Web: obedalvarado.pw
	Mail: info@obedalvarado.pw
	---------------------------*/
	ob_start();
	session_start();
	/* Connect To Database*/
	include("../../../models/db.php");
	include("../../../models/conexionv.php");
	$session_id= session_id();
	$sql_count=mysqli_query($con,"select * from tmp");
	$count=mysqli_num_rows($sql_count);
	if ($count==0)
	{
	echo "<script>alert('No hay productos agregados al presupuesto')</script>";

	//echo "<script>window.close();</script>";
	exit;
	}

	require_once(dirname(__FILE__).'../../html2pdf.class.php');
	//Variables por GET
	$cliente=intval($_GET['cliente']);
	$descripcion=mysqli_real_escape_string($con,(strip_tags($_REQUEST['descripcion'], ENT_QUOTES)));
	$nombre=mysqli_real_escape_string($con,(strip_tags($_REQUEST['nombre'], ENT_QUOTES)));
	$cita=intval($_GET['cita']);

	//Fin de variables por GET
	$total=mysqli_num_rows(mysqli_query($con,"SELECT id as last FROM presupuestos WHERE pre_cita=$cita"));
	if($total===0){
		$sql=mysqli_query($con, "select LAST_INSERT_ID(id) as last from presupuestos order by id desc limit 0,1");
		$rw=mysqli_fetch_array($sql);
		$numero=$rw['last']+1;
		$grabar=2;
	} else{
		$sql=mysqli_query($con,"select id as last from presupuestos where pre_cita = $cita order by id desc limit 0,1");
		$rw=mysqli_fetch_array($sql);
		$numero=$rw['last'];
		$grabar=1;
	}


	$perfil=mysqli_query($con,"select * from perfil limit 0,1");//Obtengo los datos de la empresa
	$rw_perfil=mysqli_fetch_array($perfil);
	
	$sql_cliente=mysqli_query($con,"select * from clientes where id='$cliente' limit 0,1");//Obtengo los datos del proveedor
	$rw_cliente=mysqli_fetch_array($sql_cliente);

	$sql_emp=mysqli_query($con,"select pre_empleada, pre_agendo from presupuestos where pre_cita=$cita");
	$rw_emp=mysqli_fetch_array($sql_emp);
	$previa=mysqli_num_rows($sql_emp);	
	
    // get the HTML
    
     include(dirname('__FILE__').'/res/presupuesto_html.php');
    $content = ob_get_clean();

    try
    {
        // init HTML2PDF
        $html2pdf = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');
        // convert
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        // send the PDF
        $html2pdf->Output('Presupuesto.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }