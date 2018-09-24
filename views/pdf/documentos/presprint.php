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
	$ppto=intval($_GET['ppto']);
	$session_id= session_id();
	$sql_count=mysqli_query($con,"select * from detalle where id_presupuesto=$ppto");
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

	//Fin de variables por GET
	
	$busqueda=mysqli_query($con,"select pre_cita as numcita from presupuestos where id=$ppto");
	$rw_busqueda=mysqli_fetch_array($busqueda);
	$rowbusqueda=$rw_busqueda['numcita'];
	$buscarnota=mysqli_query($con,"select nota from citas where idCitas=$rowbusqueda");
	$resnota=mysqli_fetch_array($buscarnota);
	$notacita=$resnota['nota'];

	$numero=$ppto;
	$perfil=mysqli_query($con,"select * from perfil limit 0,1");//Obtengo los datos de la empresa
	$rw_perfil=mysqli_fetch_array($perfil);
	
	$sql_cliente=mysqli_query($con,"select * from clientes where id='$cliente' limit 0,1");//Obtengo los datos del proveedor
	$rw_cliente=mysqli_fetch_array($sql_cliente);

	$sql_emp=mysqli_query($con,"select pre_empleada, pre_agendo from presupuestos where id=$numero");
	$rw_emp=mysqli_fetch_array($sql_emp);
	$rwagen=$rw_emp['pre_agendo'];
	$rwaten=$rw_emp['pre_empleada'];

if ($rwagen != NULL){
	$sql_empa=mysqli_query($con,"select nombre as nomagen from usuarios where id=$rwagen");
	$rw_empa=mysqli_fetch_array($sql_empa);
	$empagendo=$rw_empa['nomagen'];
} else {
	$empagendo=" ";
}
if ($rwaten != NULL){
	$sql_empat=mysqli_query($con,"select nombre as nomaten from usuarios where id=$rwaten");
	$rw_empat=mysqli_fetch_array($sql_empat);
	$empatendio=$rw_empat['nomaten'];
} else{
	$empatendio=" ";
}
    // get the HTML
    
     include(dirname('__FILE__').'/res/notaprint.php');
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
