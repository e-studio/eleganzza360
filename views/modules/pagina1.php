<!--============================   Pagina 1 ======================================-->
<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php");

	exit();


}

include "views/modules/encabezado.php";

?>


<div class="clear"></div> <!--  Limpiamos el renglon -->
<section id="content">
	<div class="content-wrap">
	    <div class="container clearfix">
			<div class="clear"></div> <!--  Limpiamos el renglon -->
			<div class="col_full">
				<h4>Reporte</h4>

				<table class="table table-bordered">
					<thead>
					    <tr>
					      <th>#</th>
					      <th>Nombre</th>
					      <th>Fecha</th>
					      <th>Observaciones</th>
					      <th>Adjuntos</th>
					    </tr>
					</thead>
				  	<tbody>
				 		<tr>  <td>1</td>  <td>Hablar Con Proveedor de Manteleria</td>  <td>2017-03-03</td>  <td>El telefono es 614 123 4433</td>  <td>    </td></tr>
				  	</tbody>						
				</table>

			</div>
		</div>
	</div>
</section>
<!--====  Fin de INICIO  ====-->