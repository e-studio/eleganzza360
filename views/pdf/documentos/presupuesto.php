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

	//Fin de variables por GET
	$sql=mysqli_query($con, "select LAST_INSERT_ID(id) as last from presupuestos order by id desc limit 0,1 ");
	$rw=mysqli_fetch_array($sql);
	$numero=$rw['last']+1;	
	$perfil=mysqli_query($con,"select * from perfil limit 0,1");//Obtengo los datos de la empresa
	$rw_perfil=mysqli_fetch_array($perfil);
	
	$sql_cliente=mysqli_query($con,"select * from clientes where id='$cliente' limit 0,1");//Obtengo los datos del proveedor
	$rw_cliente=mysqli_fetch_array($sql_cliente);
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
