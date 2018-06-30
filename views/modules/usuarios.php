<!--============================   Pagina 1 ======================================-->
<?php

session_start();

if(!$_SESSION["validar"]){

	header("location:index.php?action=ingresar");
	exit();


}

include "views/modules/encabezado.php";

?>

<!-- Page Title
    ============================================= -->
    <section id="page-title" class="page-title-mini">

      <div class="container clearfix">
        <h1>Usuarios Registrados</h1>

      </div>

    </section>
<!-- #page-title end -->


<div class="clear"></div> <!--  Limpiamos el renglon -->
<section id="content">
	<div class="content-wrap">
	    <div class="container clearfix">
			<div class="clear"></div> <!--  Limpiamos el renglon -->
			<div class="col_full">

				<table class="table table-bordered">
					
					<thead>
						
						<tr>
							<th>Usuario</th>
							<th>Contraseña</th>
							<th>Email</th>
							<th></th>
							<th></th>

						</tr>

					</thead>

					<tbody>
						
						<?php

						$vistaUsuario = new MvcController();
						$vistaUsuario -> vistaUsuariosController();
						//$vistaUsuario -> borrarUsuarioController();

						?>

					</tbody>

				</table>

			<?php

			if(isset($_GET["action"])){

				if($_GET["action"] == "cambio"){

					echo "Cambio Exitoso";
				
				}

			}

			?>



			</div>
		</div>
	</div>
</section>
<!--====  Fin de INICIO  ====-->
