<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }

.text-center{
	text-align:center
}
.text-right{
	text-align:right
}
table th, td{
	font-size:13px
}
.detalle td{
	border:solid 1px #bdc3c7;
	padding:10px;
}
.items{
	border:solid 1px #bdc3c7;
	 
}
.items td, th{
	padding:10px;
}
.items th{
	background-color: #3498db;
	color:white;
	
}
.border-bottom{
	border-bottom: solic 1px #bdc3c7;
}
table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}
}
-->
</style>
<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
        <page_footer>
        <table class="page_footer">
            <tr>

                <td style="width: 50%; text-align: left">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                </td>
                <td style="width: 50%; text-align: right">
                    &copy; <?php echo "obedalvarado.pw "; echo  $anio=date('Y'); ?>
                </td>
            </tr>
        </table>
    </page_footer>
    <table cellspacing="0" style="width: 100%;">
        <tr>

            <td  style="width: 33%; color: #444444;">
                <img style="width: 100%;" src="../../../views/img/eleganzzaLogo.png" alt="Logo"><br>
                
            </td>
			<td style="width: 34%;">
			<strong>E-mail : </strong> <?php echo $rw_perfil['email'];?><br>
			<strong>Teléfono : </strong> <?php echo $rw_perfil['telefono'];?><br>
			<strong>Sitio web : </strong> <?php echo $rw_perfil['web'];?><br>
			</td>
			<td style="width: 33%;">
				<strong><?php echo $rw_perfil['nombre_comercial'];?> </strong> <br>
				<strong>Dirección : </strong> <?php echo $rw_perfil['direccion'];?><br>
		
			</td>
			
        </tr>
    </table>
    <br>
	<hr style="display: block;height: 1px;border: 1.5px solid #bdc3c7;    margin: 0.5em 0;    padding: 0;">
	<table cellspacing="0" style="width: 100%;">
        <tr>

            <td  style="width: 20%; ">               
            </td>
			<td style="width: 60%;text-align:center;font-size:27px;color:#3498db; background-color: #eee;padding:10px; border-radius: 10px ">
				PRESUPUESTO DE TRABAJO
			</td>
			
			
        </tr>
    </table>
	
	<br>
	<table cellspacing="0" style="width: 100%;">
        <tr>

            <td  style="width: 60%; "> 
				
			</td>
			<td  style="width: 20%;color:white;background-color:#3498db;padding:5px;text-align:center "> 
				<strong style="font-size:14px;" >PRESUPUESTO #</strong>
			</td>
			<td  style="width: 20%; color:white;background-color:#3498db;padding:5px;text-align:center " > 
				<strong style="font-size:14px;">FECHA</strong>
			</td>
		</tr>
		
		<tr>

            <td  style="width: 60%; "> 
				
			</td>
			<td  style="width: 20%;padding:5px;text-align:center;border:solid 1px #bdc3c7;font-size:15px"> 
				<?php echo $numero;?>
			</td>
			<td  style="width: 20%;padding:5px;text-align:center;border:solid 1px #bdc3c7;font-size:15px " > 
				<?php echo date("d/m/Y");?>
			</td>
		</tr>

    </table>
	
	<br>
	<table cellspacing="0" style="width: 100%;" class="detalle">
        <tr>

            <td  style="width: 100%; "> 
				<strong style="font-size:18px;color:#2c3e50">Detalles del cliente</strong>
			</td>
		</tr>
		
		<tr>

            <td  style="width: 100%; "> 
			
				<strong>Nombre: </strong> <?php echo $rw_cliente['nombres'];?><br>
				<strong>Dirección: </strong> <?php echo $rw_cliente['direccion'];?><br>
				<strong>E-mail: </strong> <?php echo $rw_cliente['email'];?><br>
				<strong>Teléfono: </strong> <?php echo $rw_cliente['telefono'];?>
            </td>
			
			
			
        </tr>
    </table>
	
	<br>
	
	<table cellspacing="0" style="width: 100%;" class="detalle">
        <tr>

            <td  style="width: 100%; "> 
				<strong style="font-size:18px;color:#2c3e50">Descripción del trabajo</strong>

            </td>
		</tr>
		<tr>

            <td  style="width: 100%; "> 
				<?php echo $descripcion;?>
            </td>
		</tr>
    </table>
	<br>
	<table cellspacing="0" style="width: 100%;" class='items'>
        <tr>
			<th style="text-align:left;width:40%">Descripción</th>
			<th style="text-align:center;width:20%">Cantidad</th>
			<th style="text-align:right;width:20%">Precio unitario</th>
			<th style="text-align:right;width:20%">Total</th>
        </tr>
	<?php
		$query=mysqli_query($con,"select * from tmp order by id");
		$items=1;
		$suma=0;
		while($row=mysqli_fetch_array($query)){
			$total=$row['cantidad']*$row['precio'];
			$total=number_format($total,2,'.','');
			?>
		<tr>
		
			<td class="border-bottom"><?php echo $row['descripcion'];?></td>
			<td class="border-bottom text-center"><?php echo $row['cantidad'];?></td>
			<td class="border-bottom text-right"><?php echo $row['precio'];?></td>
			<td class='border-bottom text-right'><?php echo $total;?></td>

		</tr>	
		<?php
		$items++;
		$suma+=$total;
		$detalle=mysqli_query($con,"INSERT INTO `detalle` (`id`, `descripcion`, `cantidad`, `precio`, `id_presupuesto`) VALUES (NULL, '".$row['descripcion']."', '".$row['cantidad']."', '".$row['precio']."', '$numero');");
		}
	?>	
	<tr >
		<td colspan=3 class='text-right' style="font-size:24px;color: #3498db">TOTAL </td>
		<td class='text-right' style="font-size:24px;color:#3498db"><?php echo number_format($suma,2);?> </td>
	</tr>
    </table>
	
	<br>
	
	<table cellspacing="0" style="width: 100%;" class="detalle">
        <tr>

            <td  style="width: 100%; "> 
				<strong>Nota:</strong> Este presupuesto no es un contrato o una factura. Es nuestra mejor estimación al precio total para completar el trabajo indicado anteriormente, basado en nuestra inspección inicial, pero puede estar sujeto a cambios. Si los precios cambian o se requieren piezas y mano de obra adicionales, le informaremos antes de proceder con el trabajo.

            </td>
		</tr>
		
    </table>
	<br>
	<p class='text-center'>Si tiene alguna consulta relacionada con este presupuesto de trabajo, por favor contáctenos : <br><?php echo $rw_perfil['nombre_comercial'];?>, <?php echo $rw_perfil['telefono'];?>, <?php echo $rw_perfil['email'];?> </p>
	
</page>	
<?php
//Guardando los datos del presupuesto
$fecha=date("Y-m-d H:i:s");
$sql="INSERT INTO `presupuestos` (`id`, `fecha`, `id_cliente`, `descripcion`, `monto`) VALUES (NULL, '$fecha', '$cliente', '$descripcion', '$suma');";
$save=mysqli_query($con,$sql);
$delete=mysqli_query($con,"delete from tmp");
?>    